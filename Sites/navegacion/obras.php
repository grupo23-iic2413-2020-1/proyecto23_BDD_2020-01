<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
# Muestra una tabla con todos los artistas

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
  $query = "SELECT onombre, oid FROM Obra;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
  
  ?>

  <div class="container">

    <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Obras</h1>

    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">
        <tr style="text-align:center">
          <th>Obra</th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach ($obras as $obra) {
            echo "<tr><td><a href='obra_info.php?oid=$obra[1]&onombre=$obra[0]'>$obra[0]</a></td></tr>";
        }
        ?>
      </tbody>
        
    </table>
  </div>

<?php include('../templates/footer.html'); ?>