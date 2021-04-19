<?php

$sname= "rec353.encs.concordia.ca";
$uname= "rec353_4";
$password = "aA12345";

$db_name = "rec353_4";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}