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
<h1>Change Password</h1><br>
<form class='changedetails' action='confirmChangePassword.php' method='post'>
<label for='oldpassword'>Old Password</label><br>
<input type='password' name='password' /><br>
<label for='newpassword'>New Password</label><br>
<input type='password' name='newpassword' /><br>
<label for='confirmnewpassword'>Confirm New Password</label><br>
<input type='password' name='confirmnewpassword' /><br><br>
<button type='submit' value='submit' name='submit'>Change</button>
</form>

</body>
</html>