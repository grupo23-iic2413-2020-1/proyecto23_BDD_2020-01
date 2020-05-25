<?php session_start();
ob_start();
?>

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];
  $password = $_POST["password"];
  ?>
<?php
  


  #Se construye la consulta como un string
  $query = "SELECT Usuarios.uid, Usuarios.username FROM Usuarios WHERE Usuarios.username = ? and Usuarios.password = ?";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $username);
  $result -> bindParam(2, $password);
  $result -> execute();
  $user = $result -> fetchAll();

  if ($user[0][0] != Null) {
    $_SESSION["loggedin"] = True;
    $_SESSION["current_uid"] = $user[0][0];
    $_SESSION["current_username"] = $user[0][1];
    header("location: ../index.php");
      exit;
  } 
  else { 
    $query = "SELECT Usuarios.username FROM Usuarios WHERE Usuarios.username = ?";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db -> prepare($query);
    $result -> bindParam(1, $username);
    $result -> execute();
    $user = $result -> fetchAll();
    if ($user[0] != Null) {
      header("location: ../errores/log_in1.php");
      exit;
    }
    else {
      header("location: ../errores/log_in2.php");
      exit;
    }
  }

ob_end_flush();
?>