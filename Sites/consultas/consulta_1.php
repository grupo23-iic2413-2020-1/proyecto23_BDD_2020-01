<?php include('../templates/header.html');   ?>

<body>
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

  <h1 style="text-align: center; margin-top: 1rem">Consulta 1: Usernames y Correod</h1>

  <table class="table table-hover" style="align-self:center;width:90%;margin: 0 auto;">

    <tr class="table-secondary" style="text-align:center">
      <th>Username</th>
      <th>Correo</th>
    </tr>

      <?php
        foreach ($usuarios as $u) {
        echo "<tr><td>$u[0]</td><td>$u[1]</td></tr>";
      }
      ?>
    
  </table>
  </div>

<?php include('../templates/footer.html'); ?>