<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');  
require("../config/conexion.php"); ?>

<?php 
$query = "SELECT * FROM Usuarios WHERE Usuarios.uid = ?";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> bindParam(1, $_SESSION['current_uid']);
$result -> execute();
$user = $result -> fetchAll();

$uid = $user[0][0];

$url = "https://nameless-meadow-87804.herokuapp.com/users/".$uid;
$json = file_get_contents($url);
$json_data = json_decode($json, true); ?>
<body class= "bg-secondary text-white">
  <div class='row'>
    <div class='col-xs'>
      <?php include('../templates/vertical_navbar.php');  ?>
    </div>
    
    <div class="container">
      <div class='col-no-gutters'>
        <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Mensajes Enviados</h1>
        <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">
        <thead class="thead-dark">
                <tr style="text-align:center">
                <th>Id Mensaje</th>
                <th>Destinatario</th>
                <th>Fecha</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Contenido</th>
                </tr>
              </thead>
              <tbody>
        <?php 
        foreach ($json_data['messages'] as $element) {
            // $url2 = "https://cryptic-hollows-16856.herokuapp.com/users/". $element['receptant'];
            // $json2 = file_get_contents($url2);
            // $json_data2 = json_decode($json2, true);
            // echo $json_data2;
            $query = "SELECT unombre FROM Usuarios WHERE Usuarios.uid = ?";
            #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
            $result = $db -> prepare($query);
            $result -> bindParam(1, $element['receptant']);
            $result -> execute();
            $user = $result -> fetchAll();
            $user_nombre = $user[0][0];
            echo '<tr><td>'.$element['mid'].'</a></td>';
            echo '<td>'.$user_nombre.'</a></td>';
            echo '<td>'.$element['date'].'</a></td>';
            echo '<td>'.$element['lat'].'</a></td>';
            echo '<td>'.$element['long'].'</a></td>';
            echo '<td>'.$element['message'].'</a></td></tr>';
        }
        ?>
        </table>
        <?php include('../templates/footer.html'); ?>
      </div>
    </div>
  </div>
</body>