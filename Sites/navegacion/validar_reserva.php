<?php session_start();
include('../templates/header.html');  
include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fechai = $_POST["fechai"];
  $fechat = $_POST["fechat"];

  $query = "SELECT Origen.did, Origen.cnombre, Destino.cnombre, Origen.salida, Origen.duracion, 
            Origen.medio, (Origen.max - Comprados.total), Origen.precio, Origen.cid1, Origen.cid2
            FROM (SELECT * FROM Destinos, Ciudades WHERE Ciudades.cnombre='$ciudad_origen' AND Ciudades.cid=Destinos.cid1) AS Origen, 
            (SELECT * FROM Destinos, Ciudades WHERE Ciudades.cnombre='$ciudad_destino' AND Ciudades.cid=Destinos.cid2) AS Destino,
            (SELECT did, COUNT(did) AS total FROM Tickets Group by(did)) AS Comprados WHERE 
            Origen.did = Destino.did AND Origen.did = Comprados.did AND (Origen.max - Comprados.total) > 0 ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
	$result -> execute();
  $destinos = $result -> fetchAll();


  ?>