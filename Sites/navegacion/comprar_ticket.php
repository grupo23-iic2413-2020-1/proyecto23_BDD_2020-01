<?php session_start();
include('../templates/header.html');  
include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
  require("../config/conexion.php");
  
  $query = "SELECT cnombre, cid FROM Ciudad;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
	$ciudades = $result -> fetchAll();

?>

<div class="row justify-content-md-center">
  <h2> Comprar Pasaje </h2>
</div>

<form align="center" action="eleccion_ticket.php" method="post">
<div class="card card-body bg-secondary text-white">
    <label for="birthdaytime"> Elegir fecha: </label>
    <div class='center'>
    <input style="width: 10em; height: 1em; font-size: 25px; color: black; align: center" type="date" name='fecha'
             value=<?php echo date('Y-m-d') ?> min=<?php echo date('Y-m-d') ?>>
    </div>
</div>

<br>

<div class="row">
  <div class="col">
    <div class="card card-body bg-secondary text-white">
      <div class="form-group">
        <label for="sel1"> Elegir ciudad de origen</label>
        <select class="form-control form-control-lg" id="sel2" name='ciudad_origen'>
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
        <select class="form-control form-control-lg" id="sel2" name='ciudad_destino'>
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