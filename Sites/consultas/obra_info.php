<?php include('../templates/header.html');   ?>

<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $oid = $_GET['oid'];
  $onombre = $_GET['onombre'];

  #Se construye la consulta como un string
  $query = "SELECT Obra.oid, Obra.lid, Obra.onombre, Obra.periodo, Obra.fecha_inicio, 
            Obra.fecha_termino, Escultura.material 
            FROM Obra, Escultura 
            WHERE Obra.oid = $oid AND Escultura.oid = $oid ";
	$result = $db_2 -> prepare($query);
	$result -> execute();
  $esculturas = $result -> fetchAll();
  
  $query_2 = "SELECT Obra.oid, Obra.lid, Obra.onombre, Obra.periodo, Obra.fecha_inicio, 
              Obra.fecha_termino, Pintura.tecnica 
              FROM Obra, Pintura 
              WHERE Obra.oid = $oid AND Pintura.oid = $oid";
  $result_2 = $db_2 -> prepare($query_2);
  $result_2 -> execute();
  $pinturas = $result_2 -> fetchAll();

  $query_3 = "SELECT Obra.oid, Obra.lid, Obra.onombre, Obra.periodo, Obra.fecha_inicio, 
              Obra.fecha_termino
              FROM Obra, Fresco 
              WHERE Obra.oid = $oid AND Fresco.oid = $oid";
  $result_3 = $db_2 -> prepare($query_3);
  $result_3 -> execute();
  $frescos = $result_3 -> fetchAll();

  $query_4 = "SELECT Artista.anombre, Lugar.lnombre, Ciudad.cnombre, Ciudad.pnombre, Lugar.lid, Artista.aid
              FROM Obra, Crea, Artista, Lugar, Ciudad
              WHERE Obra.oid = Crea.oid AND Crea.aid = Artista.aid AND Lugar.lid = Obra.lid 
              AND Lugar.cid = Ciudad.cid AND Obra.oid = $oid";
  $result_4 = $db_2 -> prepare($query_4);
  $result_4 -> execute();
  $datos = $result_4 -> fetchAll();
  
  ?>

  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Información sobre <?php echo $onombre ?></h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>id obra</th>
          <th>id lugar</th>
          <th>Nombre</th>
          <th>Periodo</th>
          <th>Fecha Inicio</th>
          <th>Fecha Termino</th>
          <th>Tipo Obra</th>
          <th>Técnica/Material</th>
        </tr>
      </thead>
      <tbody>
    
        <?php
          foreach ($esculturas as $esc) {
            echo "<tr> <td>$esc[0]</td> <td>$esc[1]</td> <td>$esc[2]
            </td> <td>$esc[3]</td> <td>$esc[4]</td> <td>$esc[5]</td>
            <td>Escultura</td> <td>$esc[6]</td> </tr>";
          }
          foreach ($pinturas as $pint) {
                echo "<tr> <td>$pint[0]</td> <td>$pint[1]</td> <td>$pint[2]
              </td> <td>$pint[3]</td> <td>$pint[4]</td> <td>$pint[5]</td>
              <td>Pintura</td> <td>$pint[6]</td> </tr>";
          }
          foreach ($frescos as $fr) {
                echo "<tr> <td>$fr[0]</td> <td>$fr[1]</td> <td>$fr[2]
            </td> <td>$fr[3]</td> <td>$fr[4]</td> <td>$fr[5]</td>
            <td>Fresco</td> <td> - </td> </tr>";  
          }
        ?>
      </tbody>
        
    </table>
  </div>


  <br>


  <br>
	<div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Información extra sobre <?php echo $onombre ?></h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Nombre Artista</th>
          <th>Nombre Lugar</th>
          <th>Ciudad</th>
          <th>País</th>
          </tr>
      </thead>
      <tbody>
        <?php
        foreach ($datos as $dat) {
          echo "<tr> <td><p><b><a href='artista_info.php?aid=$dat[5]&anombre=$dat[0]'>$dat[0]</a></b></p></td>
           <td><p><b><a href='lugar_info.php?lid=$dat[4]&lnombre=$dat[1]>$dat[1]</a></b></p></td> 
           <td>$dat[2]</td> <td>$dat[3]</td></tr>";
        }
        ?>
      </tbody>  
    </table>

<br>

<?php include('../templates/footer.html'); ?>