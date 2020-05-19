<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");

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

<body class= "bg-secondary text-white">
    <div class="container">
        <div class="row justify-content-md-center">
            <h2> Perfil de <?php echo $username?> </h2>
        </div>

        <br>
        <div class="row justify-content-md-center">
            <div class='col-md-auto'>
                <div>
                    <h5><b>Nombre: </b> <?php echo $unombre ?> </h5>
                </div>
                <div>
                    <h5><b>Mail: </b> <?php echo $correo ?> </h5>
                </div>
                <div>
                    <h5><b>Dirección: </b> <?php echo $udir ?> </h5>
                </div>
            </div>
            </div>
    </div>
</body>