<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php
#Entregue el identificador y nombre de usuario junto a la fecha de inicio en formato
#YYYY-MM-DD, la fecha de t´ermino y el nombre del hotel de las reservas que parten desde
#el 01 de enero del 2020 y terminan antes del 31 de marzo del 2020, ambas fechas
#inclusive.

    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $query = "SELECT Usuarios.uid, Usuarios.username, Reservas.fechai, Reservas.fechat, Hoteles.hnombre 
    FROM Usuarios, Reservas, Hoteles 
    WHERE Usuarios.uid = Reservas.uid
    AND Reservas.fechai >= date '2020-01-01'
    AND Reservas.fechat <= date '2020-03-31'
    AND Reservas.hid = Hoteles.hid
    ORDER BY Usuarios.uid
    ;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db -> prepare($query);
    $result -> execute();
    $filas = $result -> fetchAll();

    ?>

<div class="container">

  <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 5</h1>

  <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

    <thead class="thead-dark">

      <tr style="text-align:center">
        <th>ID</th>
        <th>Username</th>
        <th>Fecha de inicio</th>
        <th>Fecha de término</th>
        <th>Nombre Hotel</th>
      </tr>
    </thead>
    <tbody>

      <?php
        foreach ($filas as $f) {
        echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td><td>$f[3]</td><td>$f[4]</td></tr>";
      }
      ?>
    </tbody>
    
  </table>
</div>

<?php include('../templates/footer.html'); ?>