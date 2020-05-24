<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");


$fecha_pasaje = $_GET['fecha'];
$datos = $_POST['pasajes'];
$ciudad_origen = $_GET["ciudad_origen"];
$ciudad_destino = $_GET["ciudad_destino"];
if(isset($datos)){

    if(!empty($datos)) {    
        foreach($datos as $dato){
        echo $dato.'<br>';
        }
    }

  }

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

$query2 = "SELECT MAX(eid) FROM Entradas";
$result_2 = $db -> prepare($query2);
$result_2 -> execute();
$max_eid = $result_2 -> fetchAll();

if ($max_eid == NULL) {
        $eid = 1;
    } 
else {$eid = $max_eid[0][0] + 1;
    }

$fecha_compra = date('Y-m-d');
$lid_int = (int)$lid;
$query3 = "INSERT INTO Entradas(eid, uid, lid, fecha_compra) 
           VALUES (?, ?, ?, ?)";
$result_3 = $db -> prepare($query3);
$result_3 -> bindParam(1, $eid);
$result_3 -> bindParam(2, $uid);
$result_3 -> bindParam(3, $lid_int);
$result_3 -> bindParam(4, $fecha_compra);
$result_3 -> execute();

?> 