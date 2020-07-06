<?php session_start();
if ($_SESSION['loggedin'] == False) {
  header("location: ../errores/mensajes_login.php");
  exit;}  
include('../templates/header.html');
include('../templates/navbar.php');  
require("../config/conexion.php"); 


$url = "https://nameless-meadow-87804.herokuapp.com/messages";
$json = file_get_contents($url);
$json_data = json_decode($json, true);?>
<body class= "bg-secondary text-white">
  <div class='row'>
    <div class='col-xs'>
      <?php include('../templates/vertical_navbar.php');  ?>
    </div>
    <div class="container">
      <div class='col-no-gutters'>
        <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Mensajes Recibidos</h1>
        <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

          <thead class="thead-dark">
            <tr style="text-align:center">
            <th>Remitente</th>
            <th>Fecha</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Contenido</th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($json_data as $message) {
                if ($message['receptant'] == $_SESSION['current_uid']) {
                  $url_sender = "https://nameless-meadow-87804.herokuapp.com/users/".$message['sender'];
                  $json_2 = file_get_contents($url_sender);
                  $json_data_2 = json_decode($json_2, true);
                  $user_nombre = $json_data_2['user'][0]['name'];

                echo '<td>'.$user_nombre.'</a></td>';
                echo '<td>'.$message['date'].'</a></td>';
                echo '<td>'.$message['lat'].'</a></td>';
                echo '<td>'.$message['long'].'</a></td>';
                echo '<td>'.$message['message'].'</a></td></tr>';
            }}
            ?>
          </tbody>
        </table>
        <?php include('../templates/footer.html'); ?>
      </div>
    </div>
  </div>
</body>





