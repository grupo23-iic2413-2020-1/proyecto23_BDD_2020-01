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
  $query = "SELECT Usuarios.uid FROM Usuarios WHERE Usuarios.username = ? and Usuarios.password = ?";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $username);
  $result -> bindParam(2, $password);
  $result -> execute();
  $user = $result -> fetchAll();

  if ($user[0] != Null) {
      $current_user = $user[0];
      echo $username;
  } else { 
      echo $username;
      echo 'La combinación de usuario y contraseña no son correctos';
  }
?>
<?php include('../templates/footer.html'); ?>