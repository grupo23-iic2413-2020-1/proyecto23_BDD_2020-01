<?php session_start();
ob_start();
include('../templates/header.html');  
include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");
if ($_SESSION['loggedin'] == False) {
    header("location: ../errores/perfil1.php");
    exit;} 

$fecha_compra = date('Y-m-d');
$hid = $_GET['hid'];
$fechai = new DateTime($_POST["fechai"]);
$fechat = new DateTime($_POST["fechat"]);

if ($fechat <= $fechai) {
    header("location: ../errores/fechas_incorrectas.php");
    exit;} 

if ($fechai < $fecha_compra) {
    header("location: ../errores/fechas_incorrectas.php");
    exit;} 

    
$diff_dias = $fechai->diff($fechat);

# Reconvierto las fechas a string
# $fechai->format('Y-m-d');
# $fechat->format('Y-m-d');

$query = "SELECT max(rid) FROM reservas";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> execute();
$max_rid = $result -> fetchAll();

if ($max_rid == NULL) {
$rid = 1;
} 
else {
    $rid = $max_rid[0][0] + 1;
}


$query_2 = "SELECT hid, hnombre, precio from hoteles where hid = $hid";
$result = $db -> prepare($query_2);
$result -> execute();
$hotel = $result -> fetchAll();


$query_3 = "SELECT * FROM Usuarios WHERE Usuarios.uid = ? ";


#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query_3);
$result -> bindParam(1, $_SESSION['current_uid']);
$result -> execute();
$user = $result -> fetchAll();

$uid = $user[0][0];
$username = $user[0][1];
$unombre = $user[0][2];
$correo = $user[0][3];
$udir = $user[0][4];



$query_4 = "INSERT INTO Reservas(rid, uid, hid, fechai, fechat) 
           VALUES (?, ?, ?, ?, ?)";
$result_4 = $db -> prepare($query_4);
$result_4 -> bindParam(1, $rid);
$result_4 -> bindParam(2, $uid);
$result_4 -> bindParam(3, $hid);
$result_4 -> bindParam(4, $fechai->format('Y-m-d'));
$result_4 -> bindParam(5,$fechat->format('Y-m-d'));
$result_4 -> execute();



  ?>


<body class= "bg-secondary text-white">
<div class="container">
        <br>
        <div class="row justify-content-md-center">
            <h2> Tu reserva ha sido realizada con éxito </h2>
        </div>
        <br>
        <br>
        <div class="row justify-content-md-center">
            <h2> Detalles reserva: </h2>
        </div>

        <br>

        <div class="container"> 
            <table class="table table-bordered bg-white table-borderless ">
                <tbody>
                <tr>
                    <td><b>Número de Reserva: </b></td>
                    <td> <?php echo $rid ?></td>
                </tr>
                <tr>
                    <td><b>Fecha inicio: </b></td>
                    <td> <?php echo $fechai->format('Y-m-d') ?></td>
                </tr>
                <tr>
                    <td><b>Fecha término: </b></td>
                    <td><?php echo $fechat->format('Y-m-d') ?></td>
                </tr>
                <tr>
                    <td><b>Nombre hotel: </b> </td>
                    <td><?php echo  $hotel[0][1]?></td>
                </tr>
                <tr>
                    <td><b>Total dias: </b></td>
                    <td><?php echo $diff_dias->days ?></td>
                </tr>
                <tr>
                    <td><b>Precio por noche: </b></td>
                    <td>€ <?php echo $hotel[0][2] ?></td>
                </tr>
                <tr>
                    <td><b>Precio total: </b></td>
                    <td>€ <?php echo ($hotel[0][2] * $diff_dias->days) ?></td>
                </tr>
                <tr>
                    <td><b>Fecha Compra: </b></td>
                    <td> <?php echo $fecha_compra ?></td>
                </tr>
                <tr>
                    <td><b>Usuario: </b></td>
                    <td><?php echo $username ?></td>
                </tr>
                <tr>
                    <td><b>Mail: </b></td>
                    <td><?php echo $correo ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <br>
    </div>

    <form align='center' action='perfil.php'  method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Ir al perfil'>
      </form>
    </div>

<?php ob_end_flush(); ?>