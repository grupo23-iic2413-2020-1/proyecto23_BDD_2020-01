<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
    $query = "SELECT anombre, COUNT(Crea.aid) FROM Artista, Crea 
              WHERE Artista.aid=Crea.aid GROUP BY(Artista.anombre);";

    $result = $db_2 -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  
  ?>
  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 10</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">

        <tr style="text-align:center">
            <th>Artista</th>
            <th>Cantidad obras donde participó</th>
        </tr>
      </thead>
      <tbody>
    
        <?php
          foreach ($artistas as $artista) {
            echo "<tr><td>$artista[0]</td><td>$artista[1]</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

<?php include('../templates/footer.html'); ?>