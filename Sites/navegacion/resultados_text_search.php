<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');  
require("../config/conexion.php"); ?>

<?php 

$required = $_POST["required"];
$desired = $_POST["desired"];
$forbidden = $_POST["forbidden"];
$uid_emisor = $_POST["uid_emisor"];

$url = "https://nameless-meadow-87804.herokuapp.com/text-search";

$data = array(
  'required'      => [$required],
  'desired'    => [$desired],
  'forbidden'       => [$forbidden]
);
if(!empty($uid_emisor)) {
  $data['userId'] = $uid_emisor;
}

$options = array(
  'http' => array(
    'method'  => 'GET',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $url, True, $context );
$json_data = json_decode($result, True);


?>

<body class= "bg-secondary text-white">
  <div class='row'>
    <div class='col-xs'>
      <?php include('../templates/vertical_navbar.php');  ?>
    </div>
    
    <div class="container">
      <div class='col-no-gutters'>
        <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Mensajes Enviados</h1>
        <br>
        <h2 class= "text-white" style="text-align: center; margin-top: 1rem">Required: <?php $required ?></h2>
        <h2 class= "text-white" style="text-align: center; margin-top: 1rem">Required: <?php $desired ?></h2>
        <h2 class= "text-white" style="text-align: center; margin-top: 1rem">Required: <?php $forbidden ?></h2>
        <h2 class= "text-white" style="text-align: center; margin-top: 1rem">Required: <?php $uid_emisor ?></h2>
        <br>

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
        foreach ($json_data as $element) {
            $url_receptant = "https://nameless-meadow-87804.herokuapp.com/users/".$element['receptant'];
            $json_2 = file_get_contents($url_receptant);
            $json_data_2 = json_decode($json_2, true);
            $user_nombre = $json_data_2['user'][0]['name'];

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


<?php include('../templates/footer.html'); ?>