<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
  require("../config/conexion.php");

  #Se construye la consulta como un string
  $query = "SELECT anombre, aid FROM Artista;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
  $artistas = $result -> fetchAll();
  
  $query_2 = "SELECT cnombre, cid FROM Ciudad;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result_2 = $db_2 -> prepare($query_2);
	$result_2 -> execute();
	$ciudades = $result_2 -> fetchAll();

?>

<form align="left" action="resultado_itinerario.php" method="post">
<div class="card card-body bg-secondary text-white">
    <label for="birthdaytime"> Elegir fecha: </label>
    <input style="width: 10em; height: 1em; font-size: 25px; color: black" type="date" name='fecha'>
</div>

  <br>

  <div class="card card-body bg-secondary text-white">
      <p>
       Elegir artistas:<br>
      <?php
        foreach ($artistas as $artista) {
          echo "<label><input type='checkbox' style='width: 1em; height: 1em' name='artistas[]' value='$artista[1]'> $artista[0]</label><br>";
        }
      ?>
  </div>
  
  <br>

  <div class="card card-body bg-secondary text-white">
    <div class="form-group">
      <label for="sel1"> Elegir ciudad de origen</label>
      <select class="form-control" id="sel1">
      <?php
        foreach ($ciudades as $ciudad) {
          echo "<option name='ciudad' value='$ciudad[1]'>$ciudad[0]</option>";
        }
      ?>
      </select>
    </div>
  </div>
  
  <br>

  <input class="btn btn-primary" align="center" type="submit" value="Crear Itinerario">
  </form>

  <br>

<?php include('../templates/footer.html'); ?>