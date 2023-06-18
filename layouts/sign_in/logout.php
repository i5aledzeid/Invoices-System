<?php 
session_start();

include "db_conn.php";
$uid = $_SESSION['id'];
$time = 0;
$result = mysqli_query($conn, "UPDATE user SET last_login = $time WHERE id='$uid'");

session_unset();
session_destroy();

header("Location: index.php");