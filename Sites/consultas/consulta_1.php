<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php

  #Muestre todos los username junto a su correo.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT username, correo FROM Usuarios ORDER BY Usuarios.uid;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $usuarios = $result -> fetchAll();
  ?>
  
  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 1</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">

        <tr style="text-align:center">
          <th>Username</th>
          <th>Correo</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach ($usuarios as $u) {
            echo "<tr><td>$u[0]</td><td>$u[1]</td></tr>";
          }
          ?>
      </tbody>
      
    </table>
  </div>

<?php include('../templates/footer.html'); ?>