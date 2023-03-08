<?php 

$server = "localhost:3308";
$user = "root";
$pass = "";
$database = "ODAS";

$conn = mysqli_connect($server, $user, $pass, $database);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>