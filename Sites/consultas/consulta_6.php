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
  $fecha1 = $_POST["fecha1"];
  $fecha2 = $_POST["fecha2"];

  #Se construye la consulta como un string
  $query = "SELECT Usuarios.uid, Usuarios.username, SUM(Destinos.precio)
  FROM Usuarios, Tickets, Destinos 
  WHERE Usuarios.uid = Tickets.uid
  AND Tickets.did = Destinos.did
  AND Tickets.fechac >= ?
  AND Tickets.fechac <= ?
  GROUP BY(Usuarios.uid, Usuarios.username)
  ORDER BY Usuarios.uid
  ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $fecha1);
  $result -> bindParam(2, $fecha2);
  $result -> execute();
  $filas = $result -> fetchAll();
  
  ?>

<div class="container">

  <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 6</h1>

  <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

    <thead class="thead-dark">

    <tr style="text-align:center">
      <th>ID</th>
      <th>Username</th>
      <th>Dinero Gastado</th>
    </tr>

    </thead>
    <tbody>
  
      <?php
        foreach ($filas as $f) {
          echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td></tr>";
      }
      ?>
    </tbody>
      
  </table>
</div>

<?php include('../templates/footer.html'); ?>