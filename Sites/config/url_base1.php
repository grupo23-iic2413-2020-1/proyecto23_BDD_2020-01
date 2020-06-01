<?php 
# $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'? "https://" : "http://";
#$base_url = $http . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];

$base_url = '//'.trim(trim($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], '/index.php'), '/index_E2'); 

# $base_url = dirname($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
?>