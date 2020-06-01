<?php 
# $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'? "https://" : "http://";
#$base_url = $http . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];

$base_url = '//'.$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['PHP_SELF'])); 

# $base_url = dirname(dirname($_SERVER['PHP_SELF']));
?>