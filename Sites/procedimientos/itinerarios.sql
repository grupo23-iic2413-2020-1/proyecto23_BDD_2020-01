CREATE or REPLACE Function itinerario (artistas INT[], ciudad integer, fecha date)
RETURNS TABLE (cnombre1_d1 varchar, cnombre2_d1 varchar, medio_d1 varchar, fecha_d1 time, duracion_d1 integer, precio_d1 integer,
cnombre1_d2 varchar, cnombre2_d2 varchar, medio_d2 varchar, fecha_d2 time, duracion_d2 integer, precio_d2 integer,
cnombre1_d3 varchar, cnombre2_d3 varchar, medio_d3 varchar, fecha_d3 time, duracion_d3 integer, precio_d3 integer,
precio_total integer) AS $$
DECLARE
    tupla RECORD;
BEGIN 

    CREATE TABLE ciud AS SELECT Lugar.cid
    FROM Lugar, Obra, Creo 
    WHERE Creo.aid = ANY(artistas)
    AND Obra.oid = Creo.oid
    AND Obra.lid = Lugar.lid;

    CREATE TABLE dest AS SELECT Destinos.* 
    FROM Destinos, ciud
    WHERE Destinos.cid2 = ciud.cid;

    CREATE TABLE esc0 AS SELECT d1.did
    FROM dest as d1
    WHERE d1.cid1 = ciudad;

    CREATE TABLE esc1 AS SELECT d1.did, d2.did
    FROM dest as d1, dest as d2
    WHERE d1.cid1 = ciudad
    AND d1.cid2 = d2.cid1;

    CREATE TABLE esc2 AS SELECT d1.did, d2.did, d3.did
    FROM dest as d1, dest as d2, dest as d3
    WHERE d1.cid1 = ciudad
    AND d1.cid2 = d2.cid1
    AND d2.cid2 = d3.cid1;

    CREATE TABLE itinerarios (did1 integer, did2 integer DEFAULT NULL, did3 integer DEFAULT NULL);

    FOR tupla in SELECT * FROM esc0 LOOP
        INSERT INTO itinerarios(did1, did2, did3) VALUES (tupla[0], NULL, NULL);
    END LOOP;

    FOR tupla in SELECT * FROM esc1 LOOP
        INSERT INTO itinerarios(did1, did2, did3) VALUES (tupla[0], tupla[1], NULL);
    END LOOP;

    FOR tupla in SELECT * FROM esc2 LOOP
        INSERT INTO itinerarios(did1, did2, did3) VALUES (tupla[0], tupla[1], tupla[2]);
    END LOOP;

    RETURN QUERY SELECT c1.cnombre, c2.cnombre, d1.medio, d1.fecha, d1.salida, d1.duracion, d1.precio,
    c2.cnombre, c3.cnombre, d2.medio, d2.fecha, d2.salida, d2.duracion, d2.precio,
    c3.cnombre, c4.cnombre, d3.medio, d3.fecha, d3.salida, d3.duracion, d3.precio,
    (d1.precio + d2.precio + d3.precio)
    FROM ititnerario, Destinos as d1, Destinos as d2, Destinos as d3, Ciudades as c1, Ciudades as c2, Ciudades as c3, Ciudades as c4
    WHERE itinerario.did1 = d1.did
    AND d1.cid1 = c1.cid
    AND d1.cid2 = c2.cid
    AND  itinerario.did2 = d2.did
    AND d2.cid1 = c2.cid
    AND d2.cid2 = c3.cid
    AND itinerario.did3 = d3.did
    AND d3.cid1 = c3.cid
    AND d3.cid2 = c4.cid;

    DROP TABLE ciud;
    DROP TABLE dest;
    DROP TABLE esc0;
    DROP TABLE esc1;
    DROP TABLE esc2;
    DROP TABLE itinerario;
    RETURN;


END;
$$ language plpgsql;