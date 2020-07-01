<?php session_start();
include('../templates/header.html');
include('../templates/navbar.php');  
require("../config/conexion.php"); 

$url = "https://nameless-meadow-87804.herokuapp.com/messages";
$json = file_get_contents($url);
$json_data = json_decode($json, true);?>
<div class="container">
<h1 class= "text-white" style="text-align: center; margin-top: 1rem">Lugares</h1>
<table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
        <th>Id mensaje</th>
        <th>Id Remitente</th>
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
            echo '<tr><td>'.$message['mid'].'</a></td></tr>';
            echo '<tr><td>'.$message['sender'].'</a></td></tr>';
            echo '<tr><td>'.$message['date'].'</a></td></tr>';
            echo '<tr><td>'.$message['lat'].'</a></td></tr>';
            echo '<tr><td>'.$message['long'].'</a></td></tr>';
            echo '<tr><td>'.$message['message'].'</a></td></tr>';
        }}
        ?>
      </tbody>
</div>

<?php include('../templates/footer.html'); ?>
