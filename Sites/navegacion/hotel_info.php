<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 
<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$hid = $_GET['hid'];
$hnombre = $_GET['hnombre'];
$cnombre = $_GET['cnombre'];

#Se construye la consulta como un string
$query = "select * from hoteles
        where hoteles.hid = $hid";
$result = $db -> prepare($query);
$result -> execute();
$hotel = $result -> fetchAll();
?>
<div class="row justify-content-md-center">
            <h2> Informacion de <?php echo $hnombre;?> </h2>
        </div>

        <br>
<div class="row justify-content-md-center">
    <div class='col-md-auto'>
        <div>
            <h5><b>Nombre: </b> <?php echo $hnombre ?> </h5>
        </div>
        <div>
            <h5><b>Ciudad: </b> <?php echo $cnombre ?> </h5>
        </div>
        <div>
            <h5><b>Dirección: </b> <?php echo $hotel[3] ?> </h5>
        </div>
        <div>
            <h5><b>Teléfono: </b> <?php echo $hotel[4] ?> </h5>
        </div>
        <div>
            <h5><b>Precio: </b> <?php echo $hotel[5] ?> </h5>
        </div>
    </div>
</div>

<?php include('../templates/footer.html'); ?>