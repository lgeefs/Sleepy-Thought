<?php

session_start();

include '../../header.html';
include '../../conn.php';

?>

<!DOCTYPE html>
<html>

<head>

<title>Change Email</title>

<!--Bootstrap CSS-->

<link rel="stylesheet" href="../../bootstrap.min.css" />

<!--Main CSS-->

<link rel='stylesheet' type='text/css' href='../../main.css' />

<!--profile CSS-->

<link rel='stylesheet' type='text/css' href='../stylesheets/profile.css' />

</head>

<body>

<br><br><br><br>
<?php
echo '<h2>'.$_SESSION['changeError'].'</h2>';
$_SESSION['changeError'] = '';
?>
<h1>Change Email</h1><br>
<form class='changedetails' action='confirmChangeEmail.php' method='post'>
<label for='password'>Password</label><br>
<input type='password' name='password' /><br>
<label for='newemail'>New Email</label><br>
<input type='text' name='newemail' /><br>
<label for='confirmnewemail'>Confirm New Email</label><br>
<input type='text' name='confirmnewemail' /><br><br>
<button type='submit' value='submit' name='submit'>Change</button>
</form>

</body>
</html>