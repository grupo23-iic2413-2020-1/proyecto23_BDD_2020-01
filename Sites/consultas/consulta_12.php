<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese el nombre de un pa´ıs. Muestre todos los nombres de las ciudades del pa´ıs con
# ese nombre en su base de datos.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
  $query = "SELECT Lugar.lnombre FROM Lugar, (SELECT DISTINCT O.lid, COUNT(O.periodo) FROM 
            (SELECT DISTINCT lid, periodo FROM Obra) AS O GROUP BY(lid)) AS L_P, (SELECT COUNT(Periodos.periodo) FROM 
            (SELECT DISTINCT periodo FROM Obra) AS Periodos) AS Total WHERE L_P.lid=Lugar.lid AND L_P.count=Total.count;";
  $result = $db_2 -> prepare($query);
  $result -> execute();
  $lugares = $result -> fetchAll();
  
  ?>
  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 12</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">

        <tr style="text-align:center">
            <th>Lugares</th>
        </tr>
      </thead>
      <tbody>
    
        <?php
            foreach ($lugares as $lugar) {
                echo "<tr> <td>$lugar[0]</td> </tr>";
            }
        ?>
      </tbody>
    </table>
  </div>

<?php include('../templates/footer.html'); ?>