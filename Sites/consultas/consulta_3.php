<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php #Ingrese un username. Muestre todos los nombres distintos de pa´ıses en los que ha
#hospedado el usuario con ese username mediante hoteles de la agencia.

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];

  #Se construye la consulta como un string
  $query = "SELECT DISTINCT pnombre FROM Usuarios, Reservas, Hoteles, Ciudades, Paises
  WHERE Usuarios.username = ?
  AND Usuarios.uid = Reservas.uid
  AND Reservas.fechai <= CURRENT_DATE
  AND Reservas.hid = Hoteles.hid
  AND Hoteles.cid = Ciudades.cid
  AND Ciudades.pid = Paises.pid
  ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> bindParam(1, $username);
  $result -> execute();
  $paises = $result -> fetchAll();

?>

<div class="container">

  <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Consulta 3</h1>
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

      <thead class="thead-dark">

        <tr style="text-align:center">
          <th>Paises para <?php echo $username ?></th>
        </tr>
      </thead>
      <tbody>
      
          <?php
            foreach ($paises as $p) {
              echo "<tr><td>$p[0]</td></tr>";
          }
          ?>
      </tbody>
        
    </table>
</div>

<?php include('../templates/footer.html'); ?>