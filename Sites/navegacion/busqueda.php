<?php session_start();
include('../templates/header.html'); 
include('../templates/navbar.php');  
$busq = $_POST["busqueda"];

?> 

<body class= "bg-secondary text-white">


<div class="container">

<h1 class= "text-white" style="text-align: center; margin-top: 1rem">Resultados Búsqueda</h1>
<br>

<div class="center">
<a role="button" href='#artistas' class="btn btn-dark">Artistas</a>
<a role="button" href='#obras' class="btn btn-dark">Obras</a>
<a role="button" href='#museos' class="btn btn-dark">Museos</a>
<a role="button" href='#iglesias' class="btn btn-dark">Iglesias</a>
<a role="button" href='#plazas' class="btn btn-dark">Plazas</a>
<a role="button" href='#hoteles' class="btn btn-dark">Hoteles y Ciudades</a>
</div>

<!--- ARTISTAS --->
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
  $query = "SELECT anombre, aid FROM Artista WHERE UPPER(anombre) LIKE UPPER('%$busq%');";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
  $result -> execute();
  $artistas = $result -> fetchAll();
  
  ?>
<br>
<h3 class= "text-white" style="text-align: center; margin-top: 1rem">Artistas: </h3>
<a id="artistas">
    <h1 style="padding-top: 50px; margin-top: -50px;"></h1>
</a>
<table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">
  <thead class="thead-dark">
    <tr style="text-align:center">
      <th>Artista</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($artistas[0][0] == Null) {
        echo "<tr><td>No se encontraron resultados</td></tr>";
    } else {
      foreach ($artistas as $artista) {
        echo "<tr><td><a href='artista_info.php?aid=$artista[1]&anombre=$artista[0]'>$artista[0]</a></td></tr>";
    }}
    ?>
  </tbody> 
</table>
<!--- END ARTISTAS --->

<!--- LUGARES --->
<?php 

  $query = "SELECT Lugar.lnombre, Lugar.lid 
            FROM Lugar, Museo 
            WHERE Lugar.lid = Museo.lid
            AND UPPER(lnombre) LIKE UPPER('%$busq%');";
  $result = $db_2 -> prepare($query);
  $result -> execute();
  $museos = $result -> fetchAll();


  $query_2 = "SELECT Lugar.lnombre, Lugar.lid
              FROM Lugar, Iglesia 
              WHERE Lugar.lid = Iglesia.lid
              AND UPPER(lnombre) LIKE UPPER('%$busq%');";
  $result_2 = $db_2 -> prepare($query_2);
  $result_2 -> execute();
  $iglesias = $result_2 -> fetchAll();

  $query_3 = "SELECT Lugar.lnombre, Lugar.lid
              FROM Lugar, Plaza 
              WHERE Lugar.lid = Plaza.lid
              AND UPPER(lnombre) LIKE UPPER('%$busq%');";
  $result_3 = $db_2 -> prepare($query_3);
  $result_3 -> execute();
  $plazas = $result_3 -> fetchAll();
  
?>
    <h3 class= "text-white" style="text-align: center; margin-top: 1rem">Lugares: </h3>
    <a id="museos">
    <h1 style="padding-top: 50px; margin-top: -50px;"></h1>
    </a>
    
    <table class="table table-bordered table-hover bg-white" id='' style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Museos</th>
        </tr>
      </thead>
      <tbody>

        <?php
        if ($museos[0][0] == Null) {
            echo "<tr><td>No se encontraron resultados</td></tr>";
        } else {
          foreach ($museos as $museo) {
            echo "<tr><td><a href='lugar_info.php?lid=$museo[1]&lnombre=$museo[0]'>$museo[0]</a></td></tr>";
        }}
        ?>
      </tbody>
        
    </table>
  
    <br>
    <a id='iglesias'>
    <h1 style="padding-top: 50px; margin-top: -50px;"></h1>
    </a>
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th >Iglesias</th>
        </tr>
      </thead>
      <tbody>

        <?php
        if ($iglesias[0][0] == Null) {
            echo "<tr><td>No se encontraron resultados</td></tr>";
        } else {
          foreach ($iglesias as $iglesia) {
            echo "<tr><td><a href='lugar_info.php?lid=$iglesia[1]&lnombre=$iglesia[0]'>$iglesia[0]</a></td></tr>";
        }}
        ?>
      </tbody>
        
    </table>
    <br>
    <a id='plazas'>
    <h1 style="padding-top: 50px; margin-top: -50px;"></h1>
    </a>
    <table class="table table-bordered table-hover bg-white" id='plazas' style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Plazas</th>
        </tr>
      </thead>
      <tbody>

        <?php
        if ($plazas[0][0] == Null) {
            echo "<tr><td>No se encontraron resultados</td></tr>";
        } else {
          foreach ($plazas as $plaza) {
            echo "<tr><td><a href='lugar_info.php?lid=$plaza[1]&lnombre=$plaza[0]'>$plaza[0]</a></td></tr>";
        }}
        ?>
      </tbody>
        
    </table>
<!--- END LUGARES --->

<!--- OBRAS --->
<?php 
  $query = "SELECT onombre, oid FROM Obra 
  WHERE UPPER(onombre) LIKE UPPER('%$busq%');";

  $result = $db_2 -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
  
?>

<h3 class= "text-white" style="text-align: center; margin-top: 1rem">Obras: </h3>
<a id="obras">
    <h1 style="padding-top: 50px; margin-top: -50px;"></h1>
</a>
<table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

  <thead class="thead-dark">
    <tr style="text-align:center">
      <th>Obra</th>
    </tr>
  </thead>
  <tbody>

    <?php
    if ($obras[0][0] == Null) {
        echo "<tr><td>No se encontraron resultados</td></tr>";
    } else {
      foreach ($obras as $obra) {
        echo "<tr><td><a href='obra_info.php?oid=$obra[1]&onombre=$obra[0]'>$obra[0]</a></td></tr>";
    }}
    ?>
  </tbody>
    
</table>
<!--- END OBRAS --->

<!--- HOTELES --->
<?php 
    $query = "SELECT hid, hnombre, cnombre 
    FROM ciudades, hoteles 
    where hoteles.cid = ciudades.cid
    AND (UPPER(hnombre) LIKE UPPER('%$busq%') OR UPPER(cnombre) LIKE UPPER('%$busq%'))
    order by cnombre;";

    $result = $db -> prepare($query);
    $result -> execute();
    $hoteles = $result -> fetchAll();
?>
<h3 class= "text-white"' style="text-align: center; margin-top: 1rem">Hoteles y ciudades: </h3>
<a id="hoteles">
    <h1 style="padding-top: 50px; margin-top: -50px;"></h1>
</a>
<table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

    <thead class="thead-dark">
    <tr style="text-align:center">
        <th>Hotel</th>
        <th>Ciudad</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if ($hoteles[0][0] == Null) {
        echo "<tr><td>No se encontraron resultados</td><td>No se encontraron resultados</td></tr>";
    } else {
        foreach ($hoteles as $htl) {
        echo "<tr><td><a href='hotel_info.php?hid=$htl[0]&hnombre=$htl[1]&cnombre=$htl[2]'>$htl[1]</a></td> <td> $htl[2] </td> </tr>";
        }}
    ?>
    </tbody>
    
</table>
<!--- END HOTELES --->




</div>

<?php include('../templates/footer.html'); ?>