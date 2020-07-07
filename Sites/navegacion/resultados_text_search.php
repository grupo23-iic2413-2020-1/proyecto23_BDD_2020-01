<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');  
require("../config/conexion.php"); ?>

<?php 

$required_pre = $_POST["required"];
$desired_pre = $_POST["desired"];
$forbidden_pre = $_POST["forbidden"];
$uid_emisor_pre = $_POST["uid_emisor"];

$url = "https://nameless-meadow-87804.herokuapp.com/text-search";

if(!empty($required_pre)) {
  $required = json_encode(explode("|", $required_pre), JSON_UNESCAPED_UNICODE);
  } else {
    $required = [];
  }

if(!empty($desired_pre)) {
  $desired = json_encode(explode("|", $desired_pre), JSON_UNESCAPED_UNICODE);
  } else {
    $desired = [];
  }

if(!empty($forbidden_pre)) {
  $forbidden = json_encode(explode("|", $forbidden_pre), JSON_UNESCAPED_UNICODE);
  } else {
    $forbidden = [];
  }

$data = array(
  'required'      => $required,
  'desired'    => $desired,
  'forbidden'       => $forbidden
);
if(!empty($uid_emisor)) {
  $uid_emisor = explode("|", $uid_emisor_pre);
  foreach($uid_emisor as $key => $value)
  {
  $uid_emisor[$key] = intval($value);
  }
  $data['userId'] = json_encode($uid_emisor);
  }

echo json_encode($data, JSON_UNESCAPED_UNICODE);

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
        <?php echo 'Requerido: '.$required ?>
        <br>
        <?php echo 'Deseado: '.$desired ?>
        <br>
        <?php echo 'Prohibido: '.$forbidden ?>
        <br>
        <?php echo 'Id emisor: '.$uid_emisor ?>
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
