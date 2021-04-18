<?php
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'comp353';
// $database = 'test';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  $con2 = mysqli_connect($server,$username,$password,$database);
  //print('Connected');
} catch (PDOException $e) {
  //print('Not Connnnnnnfected');
  die('Connection Failed: ' . $e->getMessage());
}

?>