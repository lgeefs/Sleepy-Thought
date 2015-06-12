<?php
session_start();
$pagename = 'Romance';
?>

<!DOCTYPE html>
<html>

<head>

<title>Romance</title>

<!--Bootstrap CSS-->

<link rel="stylesheet" href="../../bootstrap.min.css"/>

<!--Main CSS-->

<link rel='stylesheet' type='text/css' href='../../main.css' />

<!--Forums CSS-->

<link rel='stylesheet' type='text/css' href='../stylesheets/forums.css' />


</head>


<body>


<?php
include '../../header.html';
include '../../conn.php';
?>


<br><br>

<h1>Romance</h1>

<br><br>


<?php

include 'retrievePosts.php';

include 'commentSection.html';

?>


</body>


</html>