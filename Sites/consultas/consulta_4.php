<?php include('../templates/header.html');   ?>

<body>
<?php #Ingrese el identificador de un usuario. Muestre la cantidad de dinero que ha gastado el
#usuario con ese identificador en todos los tickets que ha comprado

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $uid = $_POST["uid"];

  #Se construye la consulta como un string
  $query = "SELECT SUM(Destinos.precio) FROM Usuarios, Tickets, Destinos
  WHERE Usuarios.uid = ?
  AND Usuarios.uid = Tickets.uid
  AND Tickets.fechac <= current_timestamp
  AND Tickets.did = Destinos.did
  
  ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $uid);
  $result -> execute();
  $dinero = $result -> fetchAll();

?>

<table>
    <tr>
      <th>Dinero Gastado por ID: <?php echo $uid ?></th>
    </tr>
  
      <?php
        foreach ($dinero as $d) {
          echo "<tr><td>$d[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>