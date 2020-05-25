<?php session_start();
include('../templates/header.html');  
include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
  require("../config/conexion.php");
  
  $query = "SELECT hnombre, cnombre FROM ciudades, hoteles where hoteles.cid = ciudades.cid;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
	$hoteles = $result -> fetchAll();

?>

<div class="row justify-content-md-center">
  <h2> Reservar hotel </h2>
</div>