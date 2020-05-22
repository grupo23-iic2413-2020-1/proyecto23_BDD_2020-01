<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
  $query = "SELECT anombre, aid FROM Artista;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  
  ?>

  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Artistas</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Artista</th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach ($artistas as $artista) {
            echo "<tr><td><a href='artista_info.php?aid=$artista[1]&anombre=$artista[0]'>$artista[0]</a></td></tr>";
        }
        ?>
      </tbody>
        
    </table>
  </div>

<?php include('../templates/footer.html'); ?>