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
        <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Buscar Mensajes</h1>
        <h2 class= "text-white" style="text-align: center; margin-top: 1rem">Ingrese las características del mensaje</h2>

        <form align="center" action="resultados_text_search.php" method="post">
        Requerido:
        <input class="form-control" type="text" name="required" size=50>
        <br/><br/>
        Deseado:
        <input class="form-control" type="text" name="desired">
        <br/><br/>
        Prohibido:
        <input class="form-control" type="text" name="forbidden">
        <br/><br/>
        Id de emisor:
        <input class="form-control" type="text" name="uid_emisor">
        <br/><br/>
        <input class="btn btn-primary" type="submit" value="Buscar">
        <?php include('../templates/footer.html'); ?>
      </div>
    </div>
  </div>
</body>
