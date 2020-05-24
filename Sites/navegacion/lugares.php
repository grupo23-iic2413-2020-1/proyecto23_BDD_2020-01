<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
  $query = "SELECT Lugar.lnombre, Lugar.lid 
            FROM Lugar, Museo WHERE Lugar.lid = Museo.lid";
  $result = $db_2 -> prepare($query);
  $result -> execute();
  $museos = $result -> fetchAll();


  $query_2 = "SELECT Lugar.lnombre, Lugar.lid
              FROM Lugar, Iglesia WHERE Lugar.lid = Iglesia.lid";
  $result_2 = $db_2 -> prepare($query_2);
  $result_2 -> execute();
  $iglesias = $result_2 -> fetchAll();

  $query_3 = "SELECT Lugar.lnombre, Lugar.lid
              FROM Lugar, Plaza WHERE Lugar.lid = Plaza.lid";
  $result_3 = $db_2 -> prepare($query_3);
  $result_3 -> execute();
  $plazas = $result_3 -> fetchAll();
  
  ?>

  <div class="container">
    <br>
    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Lugares</h1>
    <br>
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Museos</th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach ($museos as $museo) {
            echo "<tr><td><a href='lugar_info.php?lid=$museo[1]&lnombre=$museo[0]'>$museo[0]</a></td></tr>";
        }
        ?>
      </tbody>
        
    </table>
    <br>
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Iglesias</th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach ($iglesias as $iglesia) {
            echo "<tr><td><a href='lugar_info.php?lid=$iglesia[1]&lnombre=$iglesia[0]'>$iglesia[0]</a></td></tr>";
        }
        ?>
      </tbody>
        
    </table>
    <br>
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Plazas</th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach ($plazas as $plaza) {
            echo "<tr><td><a href='lugar_info.php?lid=$plaza[1]&lnombre=$plaza[0]'>$plaza[0]</a></td></tr>";
        }
        ?>
      </tbody>
        
    </table>
  </div>

<?php include('../templates/footer.html'); ?>