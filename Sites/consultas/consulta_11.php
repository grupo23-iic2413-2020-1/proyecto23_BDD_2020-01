<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
#Ingrese dos fechas en formato YYYY-MM-DD: una de inicio y una de fin. Muestre el id, 
#nombre de usuario y el total de dinero gastado en tickets entre esas dos fechas, ambas
#inclusive.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $hora_llegada = $_POST["hora_llegada"];
  $hora_salida = $_POST["hora_salida"];
  $nombre_ciudad = $_POST["nombre_ciudad"];

  #Se construye la consulta como un string
  $query = "SELECT igct.lnombre, fr.onombre FROM 
            (SELECT igc.lid, igc.lnombre FROM (select cid FROM Ciudad WHERE LOWER(cnombre) LIKE LOWER('%$nombre_ciudad%')) AS cd
            , (SELECT Lugar.lid, Lugar.cid, Lugar.lnombre FROM Lugar, 
            (SELECT lid FROM Iglesia WHERE hora_apertura <= '$hora_llegada' AND hora_cierre >= '$hora_salida') AS ig
            WHERE Lugar.lid = ig.lid) AS igc WHERE cd.cid = igc.cid) AS igct,
            (SELECT Obra.oid, Obra.lid, Obra.onombre FROM Obra, Fresco WHERE Fresco.oid=Obra.oid) AS fr
            WHERE fr.lid = igct.lid;";
  $result = $db_2 -> prepare($query);
  $result -> execute();
  $iglesia_fres = $result -> fetchAll();
  
  ?>

<div class="container">

  <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 11</h1>

  <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

    <thead class="thead-dark">

    <tr style="text-align:center">
        <th>Nombre Iglesia</th>
        <th>Nombre Fresco</th>
    </tr>

    </thead>
    <tbody>
  
      <?php
        foreach ($iglesia_fres as $ig_fr) {
            echo "<tr><td>$ig_fr[0]</td> <td>$ig_fr[1]</td> </tr>";
      }
      ?>
    </tbody>
      
  </table>
</div>

<?php include('../templates/footer.html'); ?>