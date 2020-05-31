<?php session_start();
include('../templates/header.html');
include('../templates/navbar.php');  

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

  $query_4 = "SELECT onombre, fecha_inicio, fecha_termino, oid 
              FROM Obra WHERE Obra.lid = $lid";
  $result_4 = $db_2 -> prepare($query_4);
  $result_4 -> execute();
  $obras = $result_4 -> fetchAll();

  $query_5 = "SELECT Artista.anombre, Artista.aid 
              FROM Artista, Crea, Obra WHERE Artista.aid = Crea.aid 
              AND Crea.oid = Obra.oid AND Obra.lid = $lid";
  $result_5 = $db_2 -> prepare($query_5);
  $result_5 -> execute();
  $artistas = $result_5 -> fetchAll();
?>

<body class= "bg-secondary text-white">
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
  

      <?php if ($museos != NULL) {
          foreach ($museos as $mus) {
            echo "<tr> <td>$mus[0]</td> <td>$mus[1]</td> <td>$mus[2]
            </td> <td>$mus[3]</td> <td>$mus[4]</td> <td>$mus[5]</td>
             <td>$mus[6]</td></tr><br><br>";
             $precio = $mus[6];
          }
          ?>

      <?php } elseif ($iglesias != NULL) {
          foreach ($iglesias as $ig) {
            echo "<tr> <td>$ig[0]</td> <td>$ig[1]</td> <td>$ig[2]
            </td> <td>$ig[3]</td> <td>$ig[4]</td> <td>$ig[5]</td>
             <td>Gratis</td> </tr>";
          }
        ?>

      <?php } elseif ($plazas != NULL) {
          foreach ($plazas as $pl) {
           echo "<tr> <td>$pl[0]</td> <td>$pl[1]</td> <td>$pl[2]
            </td> <td>$pl[3]</td>  <td>Libre</td>
             <td>Libre</td> <td>Gratis</td> </tr>";  
          }
        }
        ?>
      </tbody>
        
    </table>
  </div>

<br>

  <?php if ($museos != NULL) { ?>
    <?php if ($_SESSION['loggedin'] == 1) { ?>
      <form align='center' action='comprar_entrada.php?lid=<?php echo $lid ?>&lnombre=<?php echo $lnombre ?>
      &precio=<?php echo $precio ?>' method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Comprar Entrada'>
      </form>

    <?php } else { ?>
      <form align='center' action='log_in.php' method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Comprar Entrada'>
      </form>
    <?php } ?>
  <?php } ?>

<br>
<br>
<div class="row">
  <div class="col">
    <div class="container">

      <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Obras en <?php echo $lnombre ?></h1>

      <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

        <thead class="thead-dark">
          <tr style="text-align:center">
            <th>Nombre Obra</th>
            <th>Año inicio</th>
            <th>Año termino</th>
            
          </tr>
        </thead>
        <tbody>


        <?php 
            foreach ($obras as $obra)  {
              echo "<tr><td><a href='obra_info.php?oid=$obra[3]&onombre=$obra[0]'>$obra[0]</a></td>
                    <td>$obra[1]</td>  <td>$obra[2]</td> </tr>";
              }
            ?>

        </tbody>
        
      </table>
    </div>
  </div>
  <div class="col">
  <div class="container">

      <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Artistas en <?php echo $lnombre ?></h1>

      <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

        <thead class="thead-dark">
          <tr style="text-align:center">
            <th>Nombre Artista</th>
            
          </tr>
        </thead>
        <tbody>


        <?php 
            foreach ($artistas as $artista)  {
              echo "<tr><td><a href='artista_info.php?aid=$artista[1]&anombre=$artista[0]'>$artista[0]</a></td></tr>";
          }
            ?>

        </tbody>
        
      </table>
    </div>

  </div>
</div>

<br>

<?php
  $busqueda = $lnombre;

  $accessKey = 'caf911e140684520b515eaefe37af2e8';
  $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';

  $headers = "Ocp-Apim-Subscription-Key: $accessKey\r\n";
    $options = array ('http' => array (
                          'header' => $headers,
                           'method' => 'GET'));

    // Perform the request and get a JSON response.
    $context = stream_context_create($options);
    $resultado = file_get_contents($endpoint . "?q=" . urlencode($busqueda), false, $context);
    // Extract Bing HTTP headers.
    $headers = array();
    foreach ($http_response_header as $k => $v) {
        $h = explode(":", $v, 2);
        if (isset($h[1]))
            if (preg_match("/^BingAPIs-/", $h[0]) || preg_match("/^X-MSEdge-/", $h[0]))
                $headers[trim($h[0])] = trim($h[1]);
    }

    list($headers, $json) = array($headers, $resultado);
    // Prints JSON encoded response.
    // echo json_encode(json_decode($json), JSON_PRETTY_PRINT);
    //echo json_encode(json_decode($json), JSON_PRETTY_PRINT);

    $json = json_decode($json, true);
    // echo $json['value'][0]['contentUrl'].'<br><br><br><br>';

    $image = $json['value'][0]['contentUrl'];
    if (isset($image)) {
      $imageData = base64_encode(file_get_contents($image));
      echo '<img src="data:image/jpeg;base64,'.$imageData.'" alt='.$lnombre.' width="700" height=auto>';
      echo '<h3>'.$lnombre.'</h3>';
      echo '<h5>La imagen podría estar protegida por derechos de autor.</h5>';
    } else {
      echo '<h3>No tenemos una imagen para el lugar '.$lnombre.'</h3>';
    }
?>

<br>

<?php include('../templates/footer.html'); ?>