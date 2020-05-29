<?php session_start();
include('../templates/header.html');  
include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha = $_POST["fecha"];
  $ciudad_origen = $_POST["ciudad_origen"];
  $ciudad_destino = $_POST["ciudad_destino"];

  $query = "SELECT Origen.did, Origen.cnombre, Destino.cnombre, Origen.salida, Origen.duracion, 
            Origen.medio, (Origen.max - Comprados.total), Origen.precio, Origen.cid1, Origen.cid2
            FROM (SELECT * FROM Destinos, Ciudades WHERE Ciudades.cnombre='$ciudad_origen' AND Ciudades.cid=Destinos.cid1) AS Origen, 
            (SELECT * FROM Destinos, Ciudades WHERE Ciudades.cnombre='$ciudad_destino' AND Ciudades.cid=Destinos.cid2) AS Destino,
            (SELECT did, COUNT(did) AS total FROM Tickets Group by(did)) AS Comprados WHERE 
            Origen.did = Destino.did AND Origen.did = Comprados.did AND (Origen.max - Comprados.total) > 0 ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
	$result -> execute();
  $destinos = $result -> fetchAll();


  ?>

  <?php if(empty($destinos)) { ?>
    <div class="row justify-content-md-center">
      <h2> No existe destino para los datos solicitados </h2>
    </div>
  
  <?php } else {  ?>
    <?php if ($_SESSION['loggedin'] == 1) { ?>
    <div class="row justify-content-md-center">
      <h2> Pasajes disponibles </h2>
    </div>
    <form align="center" action="confirmacion_ticket.php?<?php 
      echo 'fecha='.$fecha.'&ciudad_origen='.$ciudad_origen.'&ciudad_destino='.$ciudad_destino ?>" method="post">
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Opción</th>
          <th>id Destino</th>
          <th>Ciudad Origen</th>
          <th>Ciudad destino</th>
          <th>Hora Salida</th>
          <th>Duración (hr)</th>
          <th>Medio transporte</th>
          <th>Cupos disponibles</th> 
          <th>Precio (€)</th>
        </tr>
      </thead>
      <tbody>
      
      <?php foreach ($destinos as $destino) {
                echo "<tr> <td><label><input type='radio' style='width: 1em; height: 1em' name='pasajes[]' value='$destino[0]' required></label>
                </td><td>$destino[0]</td> <td>$destino[1]</td> 
                <td>$destino[2]</td> <td>$destino[3]</td> <td>$destino[4]</td> 
                <td>$destino[5]</td> <td>$destino[6]</td><td>$destino[7]</td></tr><br><br>";
          }
          ?>


      </tbody>
        
    </table>
    <br>

      <input class="btn btn-primary" align="center" type="submit" value="Comprar pasaje">
    </form>
  
  <?php } else { ?>

    <h2> Debes registrarte antes de comprar </h2>
    <br>
    <form action="log_in.php" method="get">
      <input class="btn btn-success btn lg" type="submit" value="Registrarse">
    </form>
    
       
      
  <?php }} ?>



<br>

<form action="comprar_ticket.php" method="get">
    <input class="btn btn-success btn lg" type="submit" value="Volver">
</form>
<br>
<?php include('../templates/footer.html'); ?>