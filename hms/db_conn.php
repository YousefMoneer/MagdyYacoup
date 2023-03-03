<?php

$sname= "localhost";
$unmae= "Yousef";
$password = "123456";

$db_name = "webapp";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}