<?php 
$host = 'localhost';
$user = 'root' ;
$pass = "";
$db = 'chat_schema';

$kon = mysqli_connect($host, $user, $pass, $db);
if (!$kon) {
    die("Connection failed: " . mysqli_connect_error());
}
