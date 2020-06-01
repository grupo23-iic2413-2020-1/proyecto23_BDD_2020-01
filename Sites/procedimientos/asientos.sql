CREATE OR REPLACE FUNCTION
asientos (total_asientos INTEGER, dest_id INTEGER)
RETURNS TABLE (asiento integer) AS $$
DECLARE
actual INTEGER;
BEGIN

CREATE TABLE secuencia(asiento integer);
actual = 1;
WHILE total_asientos >= actual LOOP
	INSERT INTO secuencia VALUES (actual);
	actual = actual + 1;
END LOOP;
RETURN QUERY SELECT * FROM secuencia EXCEPT (SELECT Tickets.asiento FROM Tickets
 WHERE Tickets.did = dest_id) ORDER BY asiento;
DROP TABLE secuencia;
END;
$$ language plpgsql


