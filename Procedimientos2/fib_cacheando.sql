CREATE OR REPLACE FUNCTION fib_cacheando(
numero integer
) RETURNS integer AS $$
DECLARE
ret integer;
BEGIN
if numero < 2 THEN
RETURN numero;
END IF;
SELECT INTO ret fib
FROM fib_cache
WHERE num = numero;
IF ret IS NULL THEN
ret := fib_cacheando(numero - 2) + fib_cacheando(numero - 1);
INSERT INTO fib_cache (num, fib)
VALUES (numero, ret);
END IF;
RETURN ret;
END;
$$ LANGUAGE plpgsql;
