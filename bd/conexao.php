<?php

$dsn = 'mysql:dbname=projeto_web_2021_1;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try{
  $conn = new PDO($dsn, $user, $password);
}catch (PDOException $e){
  die('DB Error: ' . $e->getMessage());
}

?>