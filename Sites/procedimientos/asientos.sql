CREATE OR REPLACE FUNCTION
asientos (total_asientos INTEGER, dest_id INTEGER, fecha_p TEXT)
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
 WHERE Tickets.did = dest_id AND Tickets.fechav = (fecha_p + ' 00:00:00')) ORDER BY asiento;
DROP TABLE secuencia;
END;
$$ language plpgsql


