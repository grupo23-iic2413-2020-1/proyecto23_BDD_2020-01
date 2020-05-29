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
        <div class="row justify-content-md-center">
            <h2> Tu Compra ha sido realizada con éxito </h2>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <h2> Detalles compra: </h2>
        </div>

        <br>
        <div class="row justify-content-md-center">
            <div class='col-md-auto'>
                <div>
                    <h5><b>Nombre Lugar: </b> <?php echo $lnombre ?> </h5>
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
                    <h5><b>Número de Ticket: </b> <?php echo $eid ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Precio: </b> <?php echo $precio ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Fecha de Compra: </b> <?php echo $fecha_compra ?> </h5>
                    <br>
                </div>

            </div>
            </div>
    </div>
    <form align='center' action='perfil.php'  method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Ir al perfil'>
      </form>

</body>

<?php include('../templates/footer.html'); ?>