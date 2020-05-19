<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha = $_POST["fecha"];
  $artistas = $_POST['artistas'];
  $ciudad = $_POST["ciudad.$value"];

  echo "<p>$fecha</p><br><p>$ciudad</p><br>'";

  if(isset($_POST['artistas'])){

    if(!empty($_POST['artistas'])) {    
        foreach($_POST['artistas'] as $value){
            echo "value : ".$value.'<br/>';
        }
    }

  }


?>

<?php include('../templates/footer.html'); ?>