CREATE OR REPLACE FUNCTION
insertar_persona (rut varchar, nombre varchar, apellido varchar)
RETURNS void AS $$
BEGIN
insert into personas values (rut,nombre,apellido);
END
$$ language plpgsql
