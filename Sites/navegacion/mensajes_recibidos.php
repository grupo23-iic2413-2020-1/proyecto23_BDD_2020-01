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
        <th>Id Mensaje</th>
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
            $query = "SELECT unombre FROM Usuarios WHERE Usuarios.uid = ?";
            #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
            $result = $db -> prepare($query);
            $result -> bindParam(1, $message['sender']);
            $result -> execute();
            $user = $result -> fetchAll();
            echo '<tr><td>'.$message['mid'].'</a></td>';
            echo '<td>'.$user[0][0].'</a></td>';
            echo '<td>'.$message['date'].'</a></td>';
            echo '<td>'.$message['lat'].'</a></td>';
            echo '<td>'.$message['long'].'</a></td>';
            echo '<td>'.$message['message'].'</a></td></tr>';
        }}
        ?>
      </tbody>
<br>
<?php include('../templates/footer.html'); ?>
</div>


