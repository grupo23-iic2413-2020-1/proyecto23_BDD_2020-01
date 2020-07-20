<?php session_start();
include('../templates/header.html');
include('../templates/navbar.php');  
require("../config/conexion.php");  

$fechai = $_POST["fechai"];
$fechat = $_POST["fechat"];

$url = "https://nameless-meadow-87804.herokuapp.com/users/".$_SESSION['current_uid'];
$json = file_get_contents($url);
$json_data = json_decode($json, true);
$marker_list = [];
if(!empty($json_data['messages'])) {
foreach ($json_data['messages'] as $message) {
    if ($message['date'] >= $fechai and $message['date'] <= $fechat){
    array_push($marker_list, ["lat" => $message['lat'], "long" => $message['long']]);}}
}
?>

<html>
 <head>
  <title>Mapa de mensajes enviados</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	crossorigin=""/>
 </head>
 <body class= "bg-secondary text-white">
    <div class='row'>
      <div class='col-xs'>
        <?php include('../templates/vertical_navbar.php');  ?>
      </div>
      
      <div class="container">
        <div class='col-no-gutters'>

          <?php echo '<h1 class= "text-white" style="text-align: center; margin-top: 1rem">Mapa de mensajes enviados</h1>'; ?> 
          <?php 
              $lat = 0;
              $long = 0;
          ?>

          <div id="mapid" style="height: 500px"></div>
          <?php include('../templates/footer.html'); ?>
          </body>

          <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
          <script>
              var map = L.map('mapid').setView([<?php echo $lat ?>, <?php echo $long ?>], 1);

              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              <?php if(!empty($marker_list)) {
                foreach($marker_list as $marker) {
                  echo 
                  'L.marker([' . $marker["lat"] . ',' . $marker["long"] . ']).addTo(map);';
                }}  ?>
          </script>
        </div>
      </div>
    </div>
  </body>

</html>