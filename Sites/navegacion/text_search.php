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
        <h5 class= "text-white" style="text-align: center; margin-top: 1rem">(separar con '|' si desea agregar mas de un elemento)</h5>
        <br>
        <form align="center" action="resultados_text_search.php" method="post">
        Requerido:
        <input class="w-25" type="text" name="required" style="width: 25em; height: 2em;">
        <br/><br/>
        Deseado:
        <input class="w-25" type="text" name="desired" style="width: 25em; height: 2em;">
        <br/><br/>
        Prohibido:
        <input class="w-25" type="text" name="forbidden" style="width: 25em; height: 2em;">
        <br/><br/>
        Id de emisor:
        <input class="w-25" type="number" min='1' name="uid_emisor" style="width: 25em; height: 2em;">
        <br/><br/>
        <input class="btn btn-primary" type="submit" value="Buscar">
        <?php include('../templates/footer.html'); ?>
      </div>
    </div>
  </div>
</body>
