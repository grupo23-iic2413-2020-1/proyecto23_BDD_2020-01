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

<body class= "bg-secondary text-white">
<div class="container">
        <br>
        <div class="row justify-content-md-center">
            <h2> Tu compra ha sido realizada con éxito </h2>
        </div>
        <br>
        <br>
        <div class="row justify-content-md-center">
            <h2> Detalles compra: </h2>
        </div>

        <br>

        <div class="container"> 
            <table class="table table-bordered bg-white table-borderless ">
                <tbody>
                <tr>
                    <td><b>Nombre Lugar: </b></td>
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
                    <td><b>Número de Entrada: </b></td>
                    <td><?php echo $eid ?></td>
                </tr>
                <tr>
                    <td><b>Fecha compra: </b></td>
                    <td><?php echo $fecha_compra ?></td>
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

    <form align='center' action='perfil.php'  method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Ir al perfil'>
      </form>

</body>

<?php include('../templates/footer.html'); ?>