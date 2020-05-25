<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del paisgit add *
  $nombre_pais = $_POST["nombre_pais"];

  #Se construye la consulta como un string
  $query = "SELECT DISTINCT Lugar.lnombre, cd.pnombre FROM Museo, Lugar, Obra, 
            (SELECT * FROM Ciudad WHERE UPPER(Ciudad.pnombre) LIKE UPPER('%$nombre_pais%')) AS cd 
            WHERE Lugar.lid = Obra.lid AND Obra.lid = Museo.lid AND 
            Lugar.cid = cd.cid AND Obra.periodo = 'Renacimiento';";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
  $result -> execute();
  $museos_renac = $result -> fetchAll();
  
  ?>
  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 9</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">

        <tr style="text-align:center">
          <th>Museos del país: <?php echo $nombre_pais ?> </th>
          <th>País </th>

        </tr>
      </thead>
      <tbody>
    
        <?php
          foreach ($museos_renac as $museo) {
            echo "<tr><td>$museo[0]</td> <td>$museo[1]</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

<?php include('../templates/footer.html'); ?>