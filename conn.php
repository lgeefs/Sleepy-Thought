<?php

$dbhost = 'localhost';
$dbuser = '*********';
$dbpass = '*************';
$dbname = 'Users';


$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die("Failed to connect to server");

$db = mysql_select_db($dbname, $conn) or die("Failed to connect to database");

?>
