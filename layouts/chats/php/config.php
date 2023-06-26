<?php
  $hostname = "localhost";
  $username = "id20838311_laravels";
  $password = "Zxijinc1996#";
  $dbname = "id20838311_laravels";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
