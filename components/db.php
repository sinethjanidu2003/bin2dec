<?php

if(!defined('db')) {
    die('Direct access not permitted');
}

$hostname = 'localhost';
$port = 3306;
$username = "root";
$password = "password";


try {
//    $conn = mysqli_connect($hostname,$username, $password, $port);
}catch (Exception $error ){
    die("Connection failed: ");
}

?>