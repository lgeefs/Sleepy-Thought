<?php session_start(); ?>
<!DOCTYPE html>

<html>


<title>Register</title>


<head>

<!--Bootstrap CSS-->

<link rel="stylesheet" href="../../bootstrap.min.css"/>

<!--Main CSS-->

<link rel='stylesheet' type='text/css' href='../../main.css' />

<link rel='stylesheet' type='text/css' href='../stylesheets/loginRegisterStyle.css' />

</head>


<body>


<?php include '../../header.html'; ?>

<br><br><br><br>

<h1>Register</h1><br><br><br>


<form action='register-conn.php' method='post'>
<label for='fname'>First Name*</label><br>
<input type='text' name='firstname'/><br><br>
<label for='lname'>Last Name*</label><br>
<input type='text' name='lastname'/><br><br>
<label for='email'>Email*</label><br>
<input type='text' name='email'/><br><br>
<label for='username'>Username*</label><br>
<input type='text' name='username'/><br><br>
<label for='password'>Password*</label><br>
<input type='password' name='password'/><br><br>
<label for='confirmpass'>Confirm Password*</label><br>
<input type='password' name='confirmpass'/><br><br>
<button type='submit' value='submit' name='submit'>Create Account</button>
</form>


</body>

</html>