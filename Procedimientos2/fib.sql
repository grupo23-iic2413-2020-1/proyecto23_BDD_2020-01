CREATE OR REPLACE FUNCTION fib (
numero integer
) RETURNS integer AS $$
BEGIN
IF numero < 2 THEN
RETURN numero;
END IF;
RETURN fib(numero - 2) + fib(numero - 1);
END;
$$ LANGUAGE plpgsql;
