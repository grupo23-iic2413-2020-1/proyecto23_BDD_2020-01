<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<?php 
$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://entrega5-2350-api-heroku.herokuapp.com/users', [
    'auth' => ['user', 'pass']
]);

echo $res->getBody();

?>
 
<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 
  ?>

  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Artistas</h1>

    
  </div>

<?php include('../templates/footer.html'); ?>