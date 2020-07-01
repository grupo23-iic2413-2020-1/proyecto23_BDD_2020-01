<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');  
require("../config/conexion.php"); ?>

<?php 
$query = "SELECT * FROM Usuarios WHERE Usuarios.uid = ?";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> bindParam(1, $_SESSION['current_uid']);
$result -> execute();
$user = $result -> fetchAll();

$uid = $user[0][0];

$url = "https://nameless-meadow-87804.herokuapp.com/users/".$uid;
$json = file_get_contents($url);
$json_data = json_decode($json, true);
foreach ($json_data['messages'] as $element) {
    // $url2 = "https://cryptic-hollows-16856.herokuapp.com/users/". $element['receptant'];
    // $json2 = file_get_contents($url2);
    // $json_data2 = json_decode($json2, true);
    // echo $json_data2;
    echo '<br/>[' . $element['date'] . ']<br />';
    echo '<br/> Enviaste a: ' . $element['receptant'] . '<br />';
    echo '' . $element['message'] . '<br />';
}


?>
 
<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 
  ?>

  <div class="container">

    
  </div>

<?php include('../templates/footer.html'); ?>