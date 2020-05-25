<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_artista = $_POST["nombre_artista"];

 	$query = "SELECT Artista.anombre, Lugar.lnombre FROM Artista, Crea, Escultura, Obra, Lugar, Plaza WHERE Artista.aid=Crea.aid AND 
            Crea.oid=Escultura.oid AND Escultura.oid=Obra.oid AND 
            Obra.lid=Lugar.lid AND Lugar.lid=Plaza.lid AND UPPER(Artista.anombre) LIKE UPPER('%$nombre_artista%');";
	$result = $db_2 -> prepare($query);
	$result -> execute();
	$plazas_artista = $result -> fetchAll();
  ?>
  
  
  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 8</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">

        <tr style="text-align:center">
          <th>Nombre Artista</th>
          <th>Nombre Plaza</th>
        </tr>
      </thead>
      <tbody>
    
        <?php
          foreach ($plazas_artista as $plaza) {
            echo "<tr><td>$plaza[0]</td> <td>$plaza[1]</td> </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

<?php include('../templates/footer.html'); ?>