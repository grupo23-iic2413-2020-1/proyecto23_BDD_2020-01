<?php include('../templates/header.html');   ?>

<body>
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $pnombre = $_POST["pnombre"];
  $pnombre = intval($pnombre);

  #Se construye la consulta como un string
  $query = "SELECT cnombre FROM Paises, Ciudades WHERE Paises.pnombre = $pnombre AND Paises.pid = Cidades.pid;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $ciudades = $result -> fetchAll();
  
  ?>

  <table>
    <tr>
      <th>Ciudades de <?php echo $pnombre ?></th>
    </tr>
  
      <?php
        foreach ($ciudades as $c) {
          echo "<tr><td>$c[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>