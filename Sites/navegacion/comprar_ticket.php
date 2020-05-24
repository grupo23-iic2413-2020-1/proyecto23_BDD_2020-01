<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
  require("../config/conexion.php");
  
  $query = "SELECT cnombre, cid FROM Ciudad;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
	$ciudades = $result -> fetchAll();

?>

<p> Compra Pasajes </p>

<form align="center" action="eleccion_ticket.php" method="post">
<div class="card card-body bg-secondary text-white">
    <label for="birthdaytime"> Elegir fecha: </label>
    <input style="width: 10em; height: 1em; font-size: 25px; color: black" type="date" name='fecha'>
</div>

<br>

<div class="row">
  <div class="col">
    <div class="card card-body bg-secondary text-white">
      <div class="form-group">
        <label for="sel1"> Elegir ciudad de origen</label>
        <select class="form-control input-lg" id="sel2" name='ciudad_origen'>
        <?php
          foreach ($ciudades as $ciudad) {
            echo "<option>$ciudad[0]</option>";
          }
        ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card card-body bg-secondary text-white">
      <div class="form-group">
        <label for="sel1"> Elegir ciudad de destino</label>
        <select class="form-control input-lg" id="sel2" name='ciudad_destino'>
        <?php
          foreach ($ciudades as $ciudad) {
            echo "<option>$ciudad[0]</option>";
          }
        ?>
        </select>
      </div>
    </div>
  </div>
</div>
  
<br>

<input class="btn btn-primary" align="center" type="submit" value="Buscar pasajes">

</form>

  <br>

<?php include('../templates/footer.html'); ?>