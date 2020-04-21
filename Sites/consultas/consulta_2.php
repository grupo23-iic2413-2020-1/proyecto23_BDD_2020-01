<?php include('../templates/header.html');   ?>

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $pnombre = $_POST["pnombre"];

  #Se construye la consulta como un string
  $query = "SELECT cnombre FROM Paises, Ciudades WHERE Paises.pnombre = ? AND Paises.pid = Ciudades.pid;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $pnombre);
  $result -> execute();
  $ciudades = $result -> fetchAll();
  
  ?>
  <div class="container">

  <h1 style="text-align: center; margin-top: 1rem">Consulta 2</h1>

  <table class="table table-hover" style="align-self:center;width:90%;margin: 0 auto;">

    <thead class="thead-dark">

    <tr style="text-align:center">
      <th>Ciudades de <?php echo $pnombre ?> </th>
    </tr>
  
      <?php
        foreach ($ciudades as $c) {
          echo "<tr><td>$c[0]</td></tr>";
      }
      ?>
      
  </table>
  </div>

<?php include('../templates/footer.html'); ?>