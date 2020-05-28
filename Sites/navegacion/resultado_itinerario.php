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

  $query2 = "SELECT cid FROM Ciudades WHERE Ciudades.nombre = ?;";
  $result = $db -> prepare($query2);
  $result -> bindParam(1, $ciudad);
  $result -> execute();
  $ciudades = $result -> fetchAll();

  $cid = $ciudades[0][0];

  $query2 = "SELECT * FROM itinerario(?,?,?);";
  $result = $db -> prepare($query2);
  $result -> bindParam(1, array[1,2,3,4,5,6,7,8,9,10]);
  $result -> bindParam(2, $cid);
  $result -> bindParam(3, $fecha);
  $result -> execute();
  $itinerarios = $result -> fetchAll();

  echo "<p>$fecha</p><br><p>$ciudad</p><br>";

  if(isset($_POST['artistas'])){

    if(!empty($_POST['artistas'])) {    
        foreach($_POST['artistas'] as $value){
            echo "Id artista : ".$value.'<br/>';
        }
    }
  }
  $i = 1;
  foreach ($itinerarios as $itinerario) { ?>
  <h5> Itinerario N° <?php echo $i ?>. Precio total = <?php echo itinerario[18] ?>
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">
    <thead class="thead-dark">
      <tr style="text-align:center">
        <th>Ciudad Origen</th>
        <th>Ciudad Destino</th>
        <th>Medio</th>
        <th>Hora Salida</th>
        <th>Duración</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $itinerario[0] ?></td>
        <td><?php echo $itinerario[1] ?></td>
        <td><?php echo $itinerario[2] ?></td>
        <td><?php echo $itinerario[3] ?></td>
        <td><?php echo $itinerario[4] ?></td>
        <td><?php echo $itinerario[5] ?></td>
    </tr>
    <?php if (itinerario[6] != NULL) { ?> 
        <td><?php echo $itinerario[6] ?></td>
        <td><?php echo $itinerario[7] ?></td>
        <td><?php echo $itinerario[8] ?></td>
        <td><?php echo $itinerario[9] ?></td>
        <td><?php echo $itinerario[10] ?></td>
        <td><?php echo $itinerario[11] ?></td>
    <?php } ?>
    <?php if (itinerario[12] != NULL) {?> 
        <td><?php echo $itinerario[12] ?></td>
        <td><?php echo $itinerario[13] ?></td>
        <td><?php echo $itinerario[14] ?></td>
        <td><?php echo $itinerario[15] ?></td>
        <td><?php echo $itinerario[16] ?></td>
        <td><?php echo $itinerario[17] ?></td>
    <?php } ?>
    </tbody>
    
  </table>
  <br>
<?php
$i = $i + 1;
}
?>

<?php include('../templates/footer.html'); ?>