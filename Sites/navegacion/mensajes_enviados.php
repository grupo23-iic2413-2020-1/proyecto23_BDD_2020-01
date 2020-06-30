<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<?php 
$heroku = new HerokuClient([
                            'baseUrl' => 'https://entrega5-2350-api-heroku.herokuapp.com/',   // Defaults to https://api.heroku.com/
                            ],
                          ]);



$users = $heroku->get('users')->quantity;

$json = json_decode($users, true);

echo '$json'

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