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
  <?php
    $url = 'http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=';
    $key = 'http://codd.ing.puc.cl/~grupo23/navegacion/artista_info.php?aid='.$artistas[0][0].
           '&anombre='.$artistas[0][1];
    $url .= urlencode($artistas[0][1]).'&key='.$key;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $informacion = curl_exec($curl);
    curl_close($curl);
    $images = json_decode($informacion, true);

    echo "<pre>";
    print_r($images);
    echo "</pre>";


  if(true === function_exists('curl_init')){
    $ch = curl_init('http://icanhascheezburger.files.wordpress.com/2008/01/funny-pictures-cute-fierce-kitten.jpg');
    curl_setopt_array(
      $ch,
      array(
        CURLOPT_RETURNTRANSFER  => true
      )
    );
    $data = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpeg');
    echo $data;
  }


  ?>

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

<?php include('../templates/footer.html'); ?>
