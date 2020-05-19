<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];
  $password = $_POST["password"];
  ?>
<?php
  


  #Se construye la consulta como un string
  $query = "SELECT Usuarios.uid FROM Usuarios WHERE Usuarios.username = ?";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $uid);
  $result -> execute();
  $user = $result -> fetchAll();

  if ($user != Null) {
      $current_user = $user;
  } else { 
      echo 'no existe ese usuario';
  }
?>
<?php include('../templates/footer.html'); ?>