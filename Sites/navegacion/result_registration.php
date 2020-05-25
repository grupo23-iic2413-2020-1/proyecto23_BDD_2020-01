<?php session_start();
ob_start();
?> 

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];
  $correo = $_POST["email"];
  $unombre = $_POST["unombre"];
  $udir = $_POST["udir"];
  $password = $_POST["password"];
  $password_confirm = $_POST["password_confirm"];

  if ($password != $password_confirm) {
    header("location: ../errores/registration1.php");
    exit;

  } 

  #Se construye la consulta como un string
  $query1 = "SELECT Usuarios.uid FROM Usuarios WHERE Usuarios.username = ?";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query1);
  $result -> bindParam(1, $username);
  $result -> execute();
  $user = $result -> fetchAll();
  if ($user[0] != NULL) {
    header("location: ../errores/registration2.php");
    exit;

  } 
  else {
    $query2 = "SELECT MAX(uid) + 1 FROM Usuarios";
    $result = $db -> prepare($query2);
    $result -> execute();
    $max_id = $result -> fetchAll();
    $uid = $max_id[0][0];


    $query3 = "INSERT INTO Usuarios (uid, username, unombre, correo, udir, password) VALUES (?, ?, ?, ?, ?, ?)";
    $result = $db -> prepare($query3);
    $result -> bindParam(1, $uid);
    $result -> bindParam(2, $username);
    $result -> bindParam(3, $unombre);
    $result -> bindParam(4, $correo);
    $result -> bindParam(5, $udir);
    $result -> bindParam(6, $password);
    $result -> execute();

    $_SESSION["loggedin"] = True;
    $_SESSION["current_uid"] = $uid;
    $_SESSION["current_username"] = $username;

    header("location: ../index.php");
    exit;
  }

ob_end_flush();
?>