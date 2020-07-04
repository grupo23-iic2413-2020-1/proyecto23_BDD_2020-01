<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');  
require("../config/conexion.php"); ?>

<?php 

$receptor = $_POST["receptor"];
$contenido = $_POST["contenido"];

$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

$fecha = date('Y-m-d');

$url = "https://nameless-meadow-87804.herokuapp.com/messages";

$query = "SELECT * FROM Usuarios WHERE Usuarios.uid = ?";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> bindParam(1, $_SESSION['current_uid']);
$result -> execute();
$user = $result -> fetchAll();

$uid = $user[0][0];

echo $receptor;
$query_2 = "SELECT * FROM Usuarios WHERE Usuarios.username = $receptor";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result_2 = $db -> prepare($query_2);
$result_2 -> execute();
$user_receptor = $result_2 -> fetchAll();
echo $user_receptor;




?>

<body class= "bg-secondary text-white">
  <div class='row'>
    <div class='col-xs'>
      <?php include('../templates/vertical_navbar.php');  ?>
    </div>
    
    <div class="container">
      <div class='col-no-gutters'>
      <?php if(empty($user_receptor)) { ?>
          <h1 class= "text-white" style="text-align: center; margin-top: 1rem">No existe usuario ingresado</h1>

      <?php } else { 
        $uid_receptor = $user_receptor[0][0];
        
        $data = array(
          'date'      => $fecha,
          'lat'    => $new_arr[0]['geoplugin_latitude'],
          'long'       => $new_arr[0]['geoplugin_longitude'],
          'message' => $contenido,
          'receptant'      => $uid_receptor,
          'sender'      => $uid
        );

        $options = array(
          'http' => array(
            'method'  => 'POST',
            'content' => json_encode( $data ),
            'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
            )
        );
        
        $context  = stream_context_create( $options );
        $result = file_get_contents( $url, false, $context );
        $response = json_decode( $result );


        
        ?>

        <h1 class= "text-white" style="text-align: center; margin-top: 1rem"><?php $response ?></h1>
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
          echo '<tr><td>'.$mid.'</a></td>';
          echo '<td>'.$uid_receptor.'</a></td>';
          echo '<td>'.$fecha.'</a></td>';
          echo '<td>'.$new_arr[0]['geoplugin_latitude'].'</a></td>';
          echo '<td>'.$new_arr[0]['geoplugin_longitude'].'</a></td>';
          echo '<td>'.$contenido.'</a></td></tr>';
        }
        ?>
        </table>
      </div>
    </div>
  </div>
</body>
<?php include('../templates/footer.html'); ?>
