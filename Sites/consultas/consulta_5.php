<?php include('../templates/header.html');   ?>

<body>
<?php
#Entregue el identificador y nombre de usuario junto a la fecha de inicio en formato
#YYYY-MM-DD, la fecha de t´ermino y el nombre del hotel de las reservas que parten desde
#el 01 de enero del 2020 y terminan antes del 31 de marzo del 2020, ambas fechas
#inclusive.

    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $query = "SELECT Usuarios.uid, Usuarios.username, Reservas.fechai, Reservas.fechat, Hoteles.hnombre 
    FROM Usuarios, Reservas, Hoteles 
    WHERE Usuarios.uid = Reservas.uid
    AND Reservas.fechai >= date '2020-01-01'
    AND Reservas.fechat <= date '2020-03-31'
    AND Reservas.hid = Hoteles.hid
    ;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db -> prepare($query);
    $result -> execute();
    $filas = $result -> fetchAll();

    ?>

<table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Fecha de inicio</th>
      <th>Fecha de término</th>
      <th>Nombre Hotel</th>
    </tr>

      <?php
        foreach ($filass as $f) {
        echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td><td>$f[3]</td><td>$f[4]</td></tr>";
      }
      ?>
    
  </table>

<?php include('../templates/footer.html'); ?>