<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

  
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $query = "SELECT DISTINCT UPPER(onombre) FROM Obra;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
	$obras = $result -> fetchAll();
  ?>
  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 7</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">

        <tr style="text-align:center">
          <th>Nombre obra </th>
        </tr>
      </thead>
      <tbody>
    
        <?php
          foreach ($obras as $obra) {
            echo "<tr> <td>$obra[0]</td> </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

<?php include('../templates/footer.html'); ?>