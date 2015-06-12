<?php
session_start();
$pagename = 'all';
?>
<!DOCTYPE html>
<html>

<head>

<title>All Categories</title>

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

<h1>All Categories</h1>

<br><br>


<?php

include 'retrievePosts.php';

include 'commentSection.html';

mysql_close($conn);

?>

</body>


</html>