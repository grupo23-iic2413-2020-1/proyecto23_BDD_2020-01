<?php session_start();
include('../templates/header.html');  
include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$hid = $_GET['hid'];
$fechai = $_POST["fechai"];
$fechat = $_POST["fechat"];
$uid = $_SESSION ['current_uid'];



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

$fecha_compra = date('Y-m-d');

$query_2 = "SELECT hnombre, precio from hoteles where hid = $hid;";
$result = $db -> prepare($query_2);
$result -> execute();
$hotel = $result -> fetchAll();



$query_3 = "INSERT INTO Reservas(rid, uid, hid, fechai, fechat) 
           VALUES (?, ?, ?, ?, ?)";
$result_4 = $db -> prepare($query_3);
$result_4 -> bindParam(1, $rid);
$result_4 -> bindParam(2, $uid);
$result_4 -> bindParam(3, $hid);
$result_4 -> bindParam(4, $fechai);
$result_4 -> bindParam(5, $fechat);
$result_4 -> execute();


$query_4 = "SELECT * FROM Usuarios WHERE Usuarios.uid = $uid";


#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query_4);
$result -> bindParam(1, $_SESSION['current_uid']);
$result -> execute();
$user = $result -> fetchAll();

$uid2 = $user[0][0];
$username = $user[0][1];
$unombre = $user[0][2];
$correo = $user[0][3];
$udir = $user[0][4];

  ?>


<body class= "bg-secondary text-white">
    <div class="container">
        <div class="row justify-content-md-center">
            <h2> Tu reserva ha sido realizada con éxito </h2>
        </div>
        <br>
        <br>
        <div class="row justify-content-md-center">
            <h2> Detalles reserva: </h2>
        </div>

        <br>
        <div class="row justify-content-md-center">
            <div class='col-md-auto'>
                <div>
                    <h5><b>Número de Reserva: </b> <?php echo $rid ?> </h5>
                    <br>
                </div>
                <div>
                <div>
                    <h5><b>Fecha inicio: </b> <?php echo $fechai ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Fecha termino: </b> <?php echo $fechat ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Nombre hotel: </b> <?php echo $hotel[0][0] ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Precio: € </b> <?php echo $hotel[0][1] ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Fecha Compra: </b> <?php echo $fecha_compra ?> </h5>
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
                

               

            
            </div>
    <form align='center' action='perfil.php'  method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Ir al perfil'>
      </form>
    </div>
