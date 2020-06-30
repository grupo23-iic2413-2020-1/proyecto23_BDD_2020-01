<?php session_start();
ob_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");



if ($_SESSION['loggedin'] == False) {
    header("location: ../errores/perfil1.php");
    exit;} 


$query = "SELECT * FROM Usuarios WHERE Usuarios.uid = ?";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> bindParam(1, $_SESSION['current_uid']);
$result -> execute();
$user = $result -> fetchAll();

$uid = $user[0][0];
$username = $user[0][1];
$unombre = $user[0][2];
$correo = $user[0][3];
$udir = $user[0][4];


?> 

<body>

<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
</div>

</body>
<?php ob_end_flush(); ?>