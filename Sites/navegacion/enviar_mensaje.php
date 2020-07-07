<?php session_start();
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
        <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Enviar un nuevo mensaje</h1>
        <h2 class= "text-white" style="text-align: center; margin-top: 1rem">Ingrese las características del mensaje</h2>

        <form align="center" action="confirmacion_mensaje.php" method="post">
        <br><br/>
        Usuario destinatario:
        <input class="w-25" type="text" name="receptor"  style="width: 20em; height: 2em;">
        <br/><br/>
        Contenido mensaje:
        <br/>
        <textarea placeholder="Escribe aquí tu mensaje..." name="contenido" cols="40" rows="10"></textarea>
        <br/><br/>
        <input class="btn btn-primary" type="submit" value="Enviar">
        <?php include('../templates/footer.html'); ?>
      </div>
    </div>
  </div>
</body>
