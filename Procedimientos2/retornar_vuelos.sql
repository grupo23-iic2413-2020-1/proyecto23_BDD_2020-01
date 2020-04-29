CREATE OR REPLACE FUNCTION
retornar_vuelos ()
RETURNS TABLE (ciudad_origen varchar(50), ciudad_destino varchar(50),
horas integer) AS $$
BEGIN
RETURN QUERY Select * from Vuelo;
RETURN;
END
$$ language plpgsql
