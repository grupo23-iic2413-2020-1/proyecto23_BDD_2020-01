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
$response = json_decode($result);

foreach ($response as $message) {
  echo $message; }


?>


<?php include('../templates/footer.html'); ?>