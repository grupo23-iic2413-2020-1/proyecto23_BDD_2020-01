<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $aid = $_GET['aid'];
  $anombre = $_GET['anombre'];

  #Se construye la consulta como un string
  $query = "SELECT * FROM (SELECT Artista.aid, Artista.anombre, Artista.fecha_nacimiento,
            Fallecido.fecha_fallecimiento, Artista.descripcion FROM Artista, Fallecido 
            WHERE Artista.aid = Fallecido.aid 
            UNION
            SELECT  Artista.aid, Artista.anombre, Artista.fecha_nacimiento,
            Vivo.fecha_actual AS fecha_fallecimiento, Artista.descripcion FROM 
            Artista, Vivo WHERE Artista.aid = Vivo.aid) AS todos 
            WHERE todos.aid = $aid";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
  $artistas = $result -> fetchAll();
  
  $query_2 = "SELECT * FROM Obra, Crea, Artista WHERE Obra.oid = Crea.oid 
              AND Crea.aid = Artista.aid AND Artista.aid = $aid";
  $result_2 = $db_2 -> prepare($query_2);
  $result_2 -> execute();
  $obras = $result_2 -> fetchAll();
  
  
  ?>

  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Información sobre <?php echo $anombre ?></h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>id</th>
          <th>Nombre</th>
          <th>Fecha Nacimiento</th>
          <th>Fecha Muerte</th>
          <th>Nombre</th>
        </tr>
      </thead>
      <tbody>
    
        <?php
          foreach ($artistas as $artista) {
            echo "<tr> <td>$artista[0]</td> <td>$artista[1]</td> <td>$artista[2]</td> <td>$artista[3]</td> <td>$artista[4]</td> </tr>";
        }
        ?>
      </tbody>
        
    </table>
  </div>


  <br>

  <br>

	<div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Obras de <?php echo $anombre ?></h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>id obra</th>
          <th>id lugar</th>
          <th>Nombre</th>
          <th>Periodo</th>
          <th>Fecha Inicio</th>
          <th>Fecha Termino</th>
          </tr>
      </thead>
      <tbody>
        <?php
        foreach ($obras as $obra) {
                echo "<tr> <td>$obra[0]</td> <td>$obra[1]</td> <td><p><b><a href='obra_info.php?oid=$obra[0]&onombre=$obra[2]'>$obra[2]</a></b></p>
                </td> <td>$obra[3]</td> <td>$obra[4]</td> <td>$obra[5]</td></tr>";
        }
        ?>
      </tbody>  
    </table>

<br>

<?php
  $busqueda = 'Artista '.$anombre;

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
      echo '<img src="data:image/jpeg;base64,'.$imageData.'" alt='.$anombre.' width="700" height=auto>';
      echo '<h3>'.$anombre.'</h3>';
      echo '<h5>La imagen podría estar protegida por derechos de autor.</h5>';
    } else {
      echo '<h3>No tenemos una imagen para el artista '.$anombre.'</h3>';
    }
?>


<br>

<?php include('../templates/footer.html'); ?>
