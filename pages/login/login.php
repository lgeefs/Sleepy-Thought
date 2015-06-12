<?php 
session_start();

if (!empty($_SESSION['username'])) {
	header("Location: /index.php");
}
?>
<!DOCTYPE html>

<html>


<title>Login</title>


<head>

<!--Bootstrap CSS-->

<link rel="stylesheet" href="../../bootstrap.min.css"/>

<!--Main CSS-->

<link rel='stylesheet' type='text/css' href='/main.css' />

<link rel='stylesheet' type='text/css' href='../stylesheets/loginRegisterStyle.css' />

</head>


<body>

<?php include '../../header.html'; ?>

<br><br><br><br>

<h1>Login</h1><br><br><br>

<?php
echo '<h2>'.$_SESSION['loginError'].'</h2>';
$_SESSION['loginError'] = '';
?>

<form action='login-conn.php' method='post'>
<label for='username'>Username*</label><br>
<input type='text' name='username'/><br><br>
<label for='password'>Password*</label><br>
<input type='password' name='password'/><br><br>
<button type='submit' value='submit' name='submit'>Login</button>
 or <button><a href='../register/register.php'>Create an account</a></button>
</form>


</body>

</html>