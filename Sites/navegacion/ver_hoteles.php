<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

#Se construye la consulta como un string
$query = "SELECT hid, hnombre, cnombre FROM ciudades, hoteles where hoteles.cid = ciudades.cid order by cnombre;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db_2 -> prepare($query);
$result -> execute();
$hoteles = $result -> fetchAll();
echo "$hoteles[0][0]";
?>

    <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem"></h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

        <thead class="thead-dark">
        <tr style="text-align:center">
            <th>Hotel</th>
            <th>Ciudad</th>
        </tr>
        </thead>
        <tbody>

        <?php
            foreach ($hoteles as $htl) {
            echo "<tr><td><a href='hotel_info.php?hid=$htl[0]&hnombre=$htl[1]&cnombre=$htl[2]'>$htl[1]</a></td></tr>";
            }
        ?>
        </tbody>
        
    </table>
    </div>

<?php include('../templates/footer.html'); ?>