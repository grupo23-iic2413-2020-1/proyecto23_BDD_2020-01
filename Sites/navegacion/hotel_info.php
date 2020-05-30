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
$query = "SELECT * FROM hoteles
        WHERE hoteles.hid = $hid";
$result = $db -> prepare($query);
$result -> execute();
$hotel = $result -> fetchAll();
?>

<div class="container">
        <br>
        <div class="row justify-content-md-center">
            <h2> Informacion de <?php echo $hotel[0][1];?> </h2>
        </div>

        <br>

        <div class="container"> 
            <table class="table table-bordered bg-white table-borderless ">
                <tbody>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><?php echo $hotel[0][1] ?></td>
                </tr>
                <tr>
                    <td><b>Ciudad: </b></td>
                    <td><?php echo $cnombre ?></td>
                </tr>
                <tr>
                    <td><b>Dirección: </b> </td>
                    <td><?php echo $hotel[0][3] ?></td>
                </tr>
                <tr>
                    <td><b>Teléfono: </b></td>
                    <td><?php echo $hotel[0][4] ?></td>
                </tr>
                <tr>
                    <td><b>Precio (por noche): </b> </td>
                    <td>€ <?php echo $hotel[0][5] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
                
    </div>

<br>

<p>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#reserva" aria-expanded="false" aria-controls="collapseExample">
    Hacer Reserva
</button>
</p>
<div class="collapse" id="reserva">
<div class="card card-body bg-secondary text-white">
    <form align='center' action='validar_reserva.php?<?php echo 'hid='.$hid ?>'  method='post'>
        <div class="center">
            <label for="birthdaytime"> Elegir fecha inicio: </label>
            <div class='center'>
            <input style="width: 10em; height: 1em; font-size: 25px; color: black; align: center" type="date" name='fechai'
             value=<?php echo date('Y-m-d') ?> min=<?php echo date('Y-m-d') ?>>
            </div>
        </div>
        <br>
        <div class="center">
            <label for="birthdaytime"> Elegir fecha termino: </label>
            <div class='center'>
            <input style="width: 10em; height: 1em; font-size: 25px; color: black; align: center" type="date" name='fechat'
             value=<?php echo date('Y-m-d') ?> min=<?php echo date('Y-m-d') ?>>
            </div>
        </div>
        <br>
            
        <input class='btn btn-primary' align='center' type='submit' value='Validar Reserva'>
    </form>
    </div>
    </div>

<?php include('../templates/footer.html'); ?>