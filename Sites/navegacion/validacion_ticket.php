<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");


$fecha_pasaje = $_GET['fecha'];
$did_int = $_GET['did'];
$ciudad_origen = $_GET["ciudad_origen"];
$ciudad_destino = $_GET["ciudad_destino"];
$asiento = $_POST["asiento"];

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

$did = (int)$did_int;

$query2 = "SELECT * FROM Destinos WHERE did = $did";
$result_2 = $db -> prepare($query2);
$result_2 -> execute();
$data = $result_2 -> fetchAll();

$query3 = "SELECT MAX(tid) FROM Tickets";
$result_3 = $db -> prepare($query3);
$result_3 -> execute();
$max_data = $result_3 -> fetchAll();

if ($max_data == NULL) {
        $tid = 1;
    } 
else {$tid = $max_data[0][0] + 1;
    }

$fecha_compra = date('Y-m-d');



$query4 = "INSERT INTO Tickets(tid, did, uid, asiento, fechac, fechav) 
           VALUES (?, ?, ?, ?, ?, ?)";
$result_4 = $db -> prepare($query4);
$result_4 -> bindParam(1, $tid);
$result_4 -> bindParam(2, $did);
$result_4 -> bindParam(3, $uid);
$result_4 -> bindParam(4, $asiento);
$result_4 -> bindParam(5, $fecha_compra);
$result_4 -> bindParam(6, $fecha_pasaje);
$result_4 -> execute();

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
                    <td><b>Número de Ticket: </b></td>
                    <td><?php echo $tid ?></td>
                </tr>
                <tr>
                    <td><b>Fecha viaje: </b></td>
                    <td><?php echo $fecha_pasaje ?></td>
                </tr>
                <tr>
                    <td><b>Ciudad Origen: </b></td>
                    <td><?php echo $ciudad_origen ?></td>
                </tr>
                <tr>
                    <td><b>Ciudad Destino: </b> </td>
                    <td><?php echo $ciudad_destino ?></td>
                </tr>
                <tr>
                    <td><b>Hora salida: </b></td>
                    <td><?php echo $data[0][3] ?></td>
                </tr>
                <tr>
                    <td><b>Asiento: </b></td>
                    <td><?php echo $asiento ?></td>
                </tr>
                <tr>
                    <td><b>Duracion: </b></td>
                    <td><?php echo $data[0][4] ?> hrs</td>
                </tr>
                <tr>
                    <td><b>Medio: </b></td>
                    <td><?php echo $data[0][5] ?></td>
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
                    <td><b>Fecha compra: </b></td>
                    <td><?php echo $fecha_compra ?></td>
                </tr>
                <tr>
                    <td><b>Precio: </b></td>
                    <td>€ <?php echo $data[0][7] ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <br>
        
    </div>
    <form align='center' action='perfil.php'  method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Ir al perfil'>
    </form>

    <br>
    <br>

</body>

<?php include('../templates/footer.html'); ?>