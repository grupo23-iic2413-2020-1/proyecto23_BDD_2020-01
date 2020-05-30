<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  

  $fecha = $_POST["fecha"];
  $artistas = $_POST['artistas'];
  $ciudad = $_POST["ciudad"];

  ?>

<?php if(isset($artistas)){
  
  $query = "SELECT cid FROM Ciudades WHERE cnombre = ?";
  $result = $db -> prepare($query);
  $result -> bindParam(1, $ciudad);
  $result -> execute();
  $ciudades = $result -> fetchAll();

  $cid = $ciudades[0][0];

  $artistas_str = implode ( ",", $artistas );

  $query2 = "SELECT * FROM itinerario('$artistas_str', $cid, '$fecha');";
  $result = $db -> prepare($query2);
  $result -> execute();
  $itinerarios = $result -> fetchAll(); ?>



<?php
  echo "<h1>Resultados Creación de Itinerarios</h1><br>
  <p>Fecha: $fecha  </p>
  <p> Ciudad Inicial:  $ciudad </p>
  <p>Id de Artistas: $artistas_str</p><br>
  <h4> Itinerarios: </h4>";

  $i = 1;
  foreach ($itinerarios as $itinerario) { ?>
  <br>
  <h5> Itinerario N° <?php echo $i ?>. Precio total = €<?php echo $itinerario[21] ?>
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">
    <thead class="thead-dark">
      <tr style="text-align:center">
        <th>Ciudad Origen</th>
        <th>Ciudad Destino</th>
        <th>Medio</th>
        <th>Fecha Viaje</th>
        <th>Hora Salida</th>
        <th>Duración (hr)</th>
        <th>Precio (€)</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $itinerario[0] ?></td>
        <td><?php echo $itinerario[1] ?></td>
        <td><?php echo $itinerario[2] ?></td>
        <td><?php echo $itinerario[6] ?></td>
        <td><?php echo $itinerario[3] ?></td>
        <td><?php echo $itinerario[4] ?></td>
        <td><?php echo $itinerario[5] ?></td>
        
    </tr>
    <?php if ($itinerario[7] != NULL) { ?> 
      <tr>
        
        <td><?php echo $itinerario[7] ?></td>
        <td><?php echo $itinerario[8] ?></td>
        <td><?php echo $itinerario[9] ?></td>
        <td><?php echo $itinerario[13] ?></td>
        <td><?php echo $itinerario[10] ?></td>
        <td><?php echo $itinerario[11] ?></td>
        <td><?php echo $itinerario[12] ?></td>
      </tr>
    <?php } ?>
    <?php if ($itinerario[14] != NULL) {?> 
      <tr>
        <td><?php echo $itinerario[14] ?></td>
        <td><?php echo $itinerario[15] ?></td>
        <td><?php echo $itinerario[16] ?></td>
        <td><?php echo $itinerario[20] ?></td>
        <td><?php echo $itinerario[17] ?></td>
        <td><?php echo $itinerario[18] ?></td>
        <td><?php echo $itinerario[19] ?></td>
      </tr>
    <?php } ?>
    </tbody>
    
  </table>
<?php
$i = $i + 1;
}

?>
  <br>
  <form action='itinerario.php' method='get'>
    <input class='btn btn-success btn lg' type='submit' value='Volver'>
  </form>
  <br>

<?php
  } else {

    echo "<h1>No has seleccionado ningún artista para tu itinerario</h1><br>
    <form action='itinerario.php' method='get'>
    <input class='btn btn-success btn lg' type='submit' value='Volver'>
    </form><br>";
  } ?>

<?php include('../templates/footer.html'); ?>

