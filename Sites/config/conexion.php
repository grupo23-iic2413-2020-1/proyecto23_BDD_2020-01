<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php'); 
    # Se crea la instancia de PDO
    $db = new PDO("pgsql:dbname=$databaseName;host=146.155.13.72;port=5432;user=$user;password=$password");

    $db_2 = new PDO("pgsql:dbname=$databaseName_2;host=146.155.13.72;port=5432;user=$user_2;password=$password_2");

  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
