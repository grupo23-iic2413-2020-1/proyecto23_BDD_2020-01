CREATE OR REPLACE FUNCTION
seq (numero INTEGER)
RETURNS TABLE (n integer) AS $$
DECLARE
actual INTEGER;
BEGIN
CREATE TABLE secuencia(n integer);
actual = 1;
WHILE numero >= actual LOOP
	INSERT INTO secuencia VALUES (actual);
	actual = actual + 1;
END LOOP;
RETURN QUERY SELECT * FROM secuencia;
DROP TABLE secuencia;
END;
$$ language plpgsql

