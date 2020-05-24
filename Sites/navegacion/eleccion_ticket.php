<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha = $_POST["fecha"];
  $ciudad_origen = $_POST["ciudad_origen"];
  $ciudad_destino = $_POST["ciudad_destino"];

  $query = "SELECT Origen.did, Origen.cnombre, Destino.cnombre, Origen.salida, Origen.duracion, 
            Origen.medio, Origen.max, Origen.precio, Origen.cid1, Origen.cid2
            FROM (SELECT * FROM Destinos, Ciudades WHERE Ciudades.cnombre=$ciudad_origen AND Ciudades.cid=Destinos.cid1) AS Origen, 
            (SELECT * FROM Destinos, Ciudades WHERE Ciudades.cnombre=$ciudad_destino AND Ciudades.cid=Destinos.cid2) AS Destino WHERE 
            Origen.did = Destino.did";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
	$result -> execute();
  $destinos = $result -> fetchAll();

  ?>

  <?php if(empty($destinos)) {
    echo "No existe destino para los datos solicitados";
  
  } else {  ?>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>id Destino</th>
          <th>Ciudad Origen</th>
          <th>Ciudad destino</th>
          <th>Hora Salida</th>
          <th>Duración (hr)</th>
          <th>Medio transporte</th>
          <th>Cupos disponibles ARREGLAR</th> 
          <th>Precio (€)</th>
        </tr>
      </thead>
      <tbody>
  

      <?php foreach ($destinos as $destino) {
                echo "<tr> <td>$destino[0]</td> <td>$destino[1]</td> <td>$destino[2]
                </td> <td>$destino[3]</td> <td>$destino[4]</td> <td>$destino[5]</td>
                <td>$destino[6]</td><td>$destino[7]</td></tr><br><br>";
          }
          ?>

      </tbody>
        
    </table>

  <?php } ?>


<br>
<br>

<form action="comprar_ticket.php" method="get">
    <input class="btn btn-success btn lg" type="submit" value="Volver">
</form>
<br>
<br>
</body>

</html>