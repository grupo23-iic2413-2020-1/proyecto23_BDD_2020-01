<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");


$lid = $_GET['lid'];
$lnombre = $_GET['lnombre'];
$precio = $_GET['precio'];

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
            <h2> Detalles compra </h2>
        </div>

        <br>
        <div class="row justify-content-md-center">
            <div class='col-md-auto'>
                <div>
                    <h5><b>Nombre lugar: </b> <?php echo $lnombre ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Usuario: </b> <?php echo $username ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Mail: </b> <?php echo $correo ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Precio: </b> <?php echo $precio ?> </h5>
                    <br>
                </div>

            </div>
            </div>
    </div>
    <form align='center' action='validacion_compra.php?lid=<?php echo $lid ?>&lnombre=<?php echo $lnombre ?>
      &precio=<?php echo $precio ?>' method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Validar Compra'>
      </form>

    <br>
    <form align='center' action='lugar_info.php?lid=<?php echo $lid ?>&lnombre=<?php echo $lnombre ?>' method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Cancelar Compra'>
      </form>

</body>


