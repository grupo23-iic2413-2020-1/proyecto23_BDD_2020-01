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
        <br>
        <div class="row justify-content-md-center">
            <h2> Detalles compra: </h2>
        </div>

        <br>

        <div class="container"> 
            <table class="table table-bordered bg-white table-borderless ">
                <tbody>
                <tr>
                    <td><b>Nombre lugar: </b></td>
                    <td><?php echo $lnombre ?></td>
                </tr>
                <tr>
                    <td><b>Usuario: </b></td>
                    <td><?php echo $username ?></td>
                </tr>
                <tr>
                    <td><b>Mail: </b></td>
                    <td><?php echo $correo ?></td>
                </tr>
                <tr>
                    <td><b>Precio: </b></td>
                    <td>€ <?php echo $precio ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <br>
        
    </div>
    <form align='center' action='validacion_compra.php?lid=<?php echo $lid ?>&lnombre=<?php echo $lnombre ?>
      &precio=<?php echo $precio ?>' method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Validar Compra'>
      </form>

    <br>
    <form align='center' action='lugar_info.php?lid=<?php echo $lid ?>&lnombre=<?php echo $lnombre ?>' method='post'>
        <input class='btn btn-danger' align='center' type='submit' value='Cancelar Compra'>
      </form>

</body>

<?php include('../templates/footer.html'); ?>


