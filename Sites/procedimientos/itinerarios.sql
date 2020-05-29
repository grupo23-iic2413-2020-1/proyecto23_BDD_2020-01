CREATE or REPLACE Function itinerario (artistas_str text, ciudad integer, fecha date)
RETURNS TABLE (cnombre1_d1 varchar, cnombre2_d1 varchar, medio_d1 varchar, hora_d1 time, duracion_d1 double precision, precio_d1 integer, fecha_d1 date,
cnombre1_d2 varchar, cnombre2_d2 varchar, medio_d2 varchar, hora_d2 time, duracion_d2 double precision, precio_d2 integer, fecha_d2 date,
cnombre1_d3 varchar, cnombre2_d3 varchar, medio_d3 varchar, hora_d3 time, duracion_d3 double precision, precio_d3 integer, fecha_d3 date,
precio_total integer) AS $$
DECLARE
    artistas int[] := string_to_array(artistas_str, ',')::int[];
    tupla RECORD;
BEGIN 

    CREATE TABLE ciud AS SELECT DISTINCT Ciudades.cid, Ciudades.cnombre
    FROM 
    dblink('dbname=grupo50e3 host=146.155.13.72 port=5432 user=grupo50 password=grupo2350', 'SELECT lid, cid FROM Lugar')
            AS Lugar(lid integer, cid integer), 
    dblink('dbname=grupo50e3 host=146.155.13.72 port=5432 user=grupo50 password=grupo2350', 'SELECT oid, lid FROM Obra') 
            AS Obra(oid integer, lid integer),
    dblink('dbname=grupo50e3 host=146.155.13.72 port=5432 user=grupo50 password=grupo2350', 'SELECT aid, oid FROM Crea') 
            AS Crea(aid integer, oid integer), 
    Ciudades 
    WHERE Crea.aid = ANY(artistas)
    AND Obra.oid = Crea.oid
    AND Obra.lid = Lugar.lid
    AND Lugar.cid = Ciudades.cid;

    CREATE TABLE dest AS 
    SELECT DISTINCT Destinos.did, Destinos.cid1, Destinos.cid2, c1.cnombre as cnombre1, c2.cnombre as cnombre2
    FROM Destinos, ciud as c1, ciud as c2
    WHERE Destinos.cid1 = c1.cid
    AND Destinos.cid2 = c2.cid;

    CREATE TABLE esc0 AS 
    SELECT DISTINCT d1.did as did1, d1.cnombre1 as cnombre11,  d1.cnombre2 as cnombre12
    FROM dest as d1
    WHERE d1.cid1 = ciudad;

    CREATE TABLE esc1 AS 
    SELECT DISTINCT d1.did as did1, d2.did as did2, d1.cnombre1 as cnombre11,  d1.cnombre2 as cnombre12, d2.cnombre1 as cnombre21,  d2.cnombre2 as cnombre22
    FROM dest as d1, dest as d2
    WHERE d1.cid1 = ciudad
    AND d1.cid2 = d2.cid1
    AND d2.cid2 <> d1.cid1;

    CREATE TABLE esc2 AS 
    SELECT DISTINCT d1.did as did1, d2.did as did2, d3.did as did3, d1.cnombre1 as cnombre11,  d1.cnombre2 as cnombre12, d2.cnombre1 as cnombre21,  d2.cnombre2 as cnombre22, d3.cnombre1 as cnombre31,  d3.cnombre2 as cnombre32
    FROM dest as d1, dest as d2, dest as d3
    WHERE d1.cid1 = ciudad
    AND d1.cid2 = d2.cid1
    AND d2.cid2 <> d1.cid1
    AND d2.cid2 = d3.cid1
    AND d2.cid1 <> d3.cid2
    AND d3.cid2 <> d1.cid1;

    CREATE TABLE itinerarios (did1 integer, did2 integer, did3 integer, cnombre11 varchar, cnombre12 varchar, cnombre21 varchar, cnombre22 varchar, cnombre31 varchar, cnombre32 varchar);

    FOR tupla in SELECT * FROM esc0 LOOP
        INSERT INTO itinerarios(did1, did2, did3, cnombre11, cnombre12, cnombre21, cnombre22, cnombre31, cnombre32) 
        VALUES (tupla.did1, NULL, NULL, tupla.cnombre11, tupla.cnombre12, NULL, NULL, NULL, NULL);
    END LOOP;

    FOR tupla in SELECT * FROM esc1 LOOP
        INSERT INTO itinerarios(did1, did2, did3, cnombre11, cnombre12, cnombre21, cnombre22, cnombre31, cnombre32) 
        VALUES (tupla.did1, tupla.did2, NULL, tupla.cnombre11, tupla.cnombre12, tupla.cnombre21, tupla.cnombre22, NULL, NULL);
    END LOOP;

    FOR tupla in SELECT * FROM esc2 LOOP
        INSERT INTO itinerarios(did1, did2, did3, cnombre11, cnombre12, cnombre21, cnombre22, cnombre31, cnombre32) 
        VALUES (tupla.did1, tupla.did2, tupla.did3, tupla.cnombre11, tupla.cnombre12, tupla.cnombre21, tupla.cnombre22, tupla.cnombre31, tupla.cnombre32);
    END LOOP;

    RETURN QUERY 
    SELECT DISTINCT itinerarios.cnombre11, itinerarios.cnombre12, d1.medio, d1.salida, d1.duracion, d1.precio, fecha as fecha_d1,
    itinerarios.cnombre21, itinerarios.cnombre22, d2.medio, d2.salida, d2.duracion, d2.precio, 
    CASE 
    WHEN (d1.salida > d2.salida or (d1.salida + interval '1h' * d1.duracion) > d2.salida or d1.salida > (d1.salida + interval '1h' * d1.duracion)) 
    THEN (fecha  + interval '1' day)::DATE ELSE fecha
    END AS fecha_d2,
    itinerarios.cnombre31, itinerarios.cnombre32, d3.medio, d3.salida, d3.duracion, d3.precio, 
    CASE 
    WHEN (d2.salida > d3.salida or (d2.salida + interval '1h' * d2.duracion) > d3.salida or d2.salida > (d2.salida + interval '1h' * d2.duracion)) 
    THEN (
        (CASE 
        WHEN (d1.salida > d2.salida or (d1.salida + interval '1h' * d1.duracion) > d2.salida or d1.salida > (d1.salida + interval '1h' * d1.duracion)) 
        THEN (fecha  + interval '1' day)::DATE ELSE fecha END) + interval '1' day)::DATE 
    ELSE (CASE 
        WHEN (d1.salida > d2.salida or (d1.salida + interval '1h' * d1.duracion) > d2.salida or d1.salida > (d1.salida + interval '1h' * d1.duracion)) 
        THEN (fecha  + interval '1' day)::DATE ELSE fecha END)
    END AS fecha_d3 ,
    (d1.precio + d2.precio + d3.precio) as precio_total
    FROM itinerarios, Destinos as d1, Destinos as d2, Destinos as d3
    WHERE itinerarios.did1 = d1.did
    AND itinerarios.did2 = d2.did
    AND itinerarios.did3 = d3.did
    
    UNION

    SELECT DISTINCT itinerarios.cnombre11, itinerarios.cnombre12, d1.medio, d1.salida, d1.duracion, d1.precio, fecha as fecha_d1,
    itinerarios.cnombre21, itinerarios.cnombre22, d2.medio, d2.salida, d2.duracion, d2.precio, 
    CASE 
    WHEN (d1.salida > d2.salida or (d1.salida + interval '1h' * d1.duracion) > d2.salida or d1.salida > (d1.salida + interval '1h' * d1.duracion)) 
    THEN (fecha  + interval '1' day)::DATE ELSE fecha 
    END AS fecha_d2 ,
    NULL as cnombre1_d3, NULL as cnombre2_d3, NULL as medio_d3, NULL::time as hora_d3, NULL::double precision as duracion_d3, NULL::integer as precio_d3, NULL::date as fecha_d3,
    (d1.precio + d2.precio)
    FROM itinerarios, Destinos as d1, Destinos as d2
    WHERE itinerarios.did1 = d1.did
    AND itinerarios.did2 = d2.did

    UNION

    SELECT DISTINCT itinerarios.cnombre11, itinerarios.cnombre12, d1.medio, d1.salida, d1.duracion, d1.precio, fecha as fecha_d1,
    NULL as cnombre1_d2, NULL as cnombre2_d2, NULL as medio_d2, NULL::time as hora_d2, NULL::double precision as duracion_d2, NULL::integer as precio_d2,  NULL::date as fecha_d2,
    NULL as cnombre1_d3, NULL as cnombre2_d3, NULL as medio_d3, NULL::time as hora_d3, NULL::double precision as duracion_d3, NULL::integer as precio_d3, NULL::date as fecha_d3,
    d1.precio
    FROM itinerarios, Destinos as d1
    WHERE itinerarios.did1 = d1.did

    ORDER BY precio_total
    ;

    DROP TABLE ciud;
    DROP TABLE dest;
    DROP TABLE esc0;
    DROP TABLE esc1;
    DROP TABLE esc2;
    DROP TABLE itinerarios;
    RETURN;


END;
$$ language plpgsql;