<?php session_start(); ?>
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

<form action="resultado_itinerario.php" method="post">
<div class="card card-body bg-secondary text-white"  align='center'>
    <label for="birthdaytime"> Elegir fecha: </label>
    <input style="width: 10em; height: 1em; font-size: 25px; color: black" type="date" name='fecha'
    value=<?php echo date('Y-m-d') ?> min=<?php echo date('Y-m-d') ?>>
</div>

  <br>

  <div class="card card-body bg-secondary text-white" align='left'>
      <p>
       Elegir artistas:<br>
      <?php
        foreach ($artistas as $artista) {
          echo "<label><input type='checkbox' style='width: 1em; height: 1em' name='artistas[]' 
          value='$artista[1]'> $artista[0]</label><br>";
        }
      ?>
  </div>
  
  <br>

  <div class="card card-body bg-secondary text-white" align='center'>
    <div class="form-group">
      <label for="sel1"> Elegir ciudad de origen</label>
      <select class="form-control input-lg" id="sel2" name='ciudad' style='width: 10em'>
      <?php
        foreach ($ciudades as $ciudad) {
          echo "<option>$ciudad[0]</option>";
        }
      ?>
      </select>
    </div>
  </div>
  
  <br>

  <input class="btn btn-primary" align="center" type="submit" value="Crear Itinerario" name='Crear'>
  </form>

  <br>

<?php include('../templates/footer.html'); ?>