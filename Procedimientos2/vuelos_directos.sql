CREATE OR REPLACE FUNCTION
vuelos_directos (c_origen varchar)
RETURNS TABLE (ciudad_destino varchar(50), horas integer) AS $$
BEGIN
RETURN QUERY EXECUTE 'SELECT ciudad_destino, horas
FROM Vuelo
WHERE ciudad_origen = $1'
USING c_origen;
RETURN;
END
$$ language plpgsql
