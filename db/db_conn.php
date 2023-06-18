<?php

$sname= "localhost";
$unmae= "id20838311_laravels";
$password = "Zxijinc1996#";

$db_name = "id20838311_laravels";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}