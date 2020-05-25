<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
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
  AND Tickets.fechac <= CURRENT_TIMESTAMP
  AND Tickets.did = Destinos.did
  
  ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $uid);
  $result -> execute();
  $dinero = $result -> fetchAll();

?>

<div class="container">

  <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 4</h1>

  <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

    <thead class="thead-dark">

      <tr style="text-align:center">
        <th>Dinero Gastado por ID: <?php echo $uid ?></th>
      </tr>
    </thead>
    <tbody>
    
        <?php
          foreach ($dinero as $d) {
            echo "<tr><td>$d[0]</td></tr>";
        }
        ?>
    </tbody>
      
  </table>
</div>

<?php include('../templates/footer.html'); ?>