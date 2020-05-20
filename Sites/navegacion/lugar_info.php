<?php session_start();?> 
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 
<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $lid = $_GET['lid'];
  $lnombre = $_GET['lnombre'];

  #Se construye la consulta como un string
  $query = "SELECT Lugar.lid, Lugar.lnombre, Ciudad.cnombre, Ciudad.pnombre,
            Museo.hora_apertura, Museo.hora_cierre, Museo.precio
            FROM Lugar, Ciudad, Museo WHERE Lugar.cid = Ciudad.cid 
            AND Lugar.lid = Museo.lid AND Lugar.lid = $lid";
  $result = $db_2 -> prepare($query);
  $result -> execute();
  $museos = $result -> fetchAll();


  $query_2 = "SELECT Lugar.lid, Lugar.lnombre, Ciudad.cnombre, Ciudad.pnombre,
              Iglesia.hora_apertura, Iglesia.hora_cierre 
              FROM Lugar, Ciudad,Iglesia WHERE Lugar.cid = Ciudad.cid 
              AND Lugar.lid = iglesia.lid AND Lugar.lid = $lid";
  $result_2 = $db_2 -> prepare($query_2);
  $result_2 -> execute();
  $iglesias = $result_2 -> fetchAll();

  $query_3 = "SELECT Lugar.lid, Lugar.lnombre, Ciudad.cnombre, Ciudad.pnombre 
              FROM Lugar, Ciudad, Plaza WHERE Lugar.cid = Ciudad.cid 
              AND Lugar.lid = Plaza.lid AND Lugar.lid = $lid";
  $result_3 = $db_2 -> prepare($query_3);
  $result_3 -> execute();
  $plazas = $result_3 -> fetchAll();
?>

  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Información sobre <?php echo $lnombre ?></h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>id lugar</th>
          <th>Nombre Lugar</th>
          <th>Ciudad</th>
          <th>País</th>
          <th>Hora Apertura</th>
          <th>Hora Cierre</th>
          <th>Precio (€)</th>
        </tr>
      </thead>
      <tbody>
  

      <?php if ($museos != NULL) { ?>
        <?php
          foreach ($museos as $mus) {
            echo "<tr> <td>$mus[0]</td> <td>$mus[1]</td> <td>$mus[2]
            </td> <td>$mus[3]</td> <td>$mus[4]</td> <td>$mus[5]</td>
             <td>$mus[6]</td></tr><br><br>";
          }
          ?>
          <?php if ($_SESSION['loggedin'] == 1) { ?>
            <form align='center' action='comprar_entrada.php?lid=<?php echo $lid ?>' method='post'>
                <input class='btn btn-primary' align='center' type='submit' value='Comprar Entrada'>
             </form>";

          <?php } else { ?>
             <form align='center' action='registration.php' method='post'>
                <input class='btn btn-primary' align='center' type='submit' value='Comprar Entrada'>
             </form>";
             <?php } ?>

      <?php } elseif ($iglesias != NULL) { ?>
        <?php
          foreach ($iglesias as $ig) {
            echo "<tr> <td>$ig[0]</td> <td>$ig[1]</td> <td>$ig[2]
            </td> <td>$ig[3]</td> <td>$ig[4]</td> <td>$ig[5]</td>
             <td>Gratis</td> </tr>";
          }
        ?>

      <?php } elseif ($plazas != NULL) { ?>
        <?php
          foreach ($plazas as $pl) {
           echo "<tr> <td>$pl[0]</td> <td>$pl[1]</td> <td>$pl[2]
            </td> <td>$pl[3]</td>  <td>Libre</td>
             <td>Libre</td> <td>Gratis</td> </tr>";  
          }
        ?>
      </tbody>
        
    </table>
  </div>



<br>

<?php include('../templates/footer.html'); ?>
