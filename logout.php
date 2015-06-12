<?php

session_start();

header("Location: /index.php");

$_SESSION['username'] = '';
$_SESSION['loggedin'] = false;

session_unset();
session_destroy();

?>