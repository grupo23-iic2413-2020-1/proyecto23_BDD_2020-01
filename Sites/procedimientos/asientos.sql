CREATE OR REPLACE FUNCTION
asientos (total_asientos INTEGER, dest_id INTEGER, fecha_p DATETIME)
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
 WHERE Tickets.did = dest_id AND Tickets.fechav = CONVERT(DATE, fecha_p)) ORDER BY asiento;
DROP TABLE secuencia;
END;
$$ language plpgsql


