<?php

session_start();
include '../../header.html';

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$password = '*************';

?>


<!DOCTYPE html>
<html>

<head>

<title>Sleepy Thought</title>

<!--Bootstrap CSS-->

<link rel="stylesheet" href="../../bootstrap.min.css" />

<!--Main CSS File-->

<link rel="stylesheet" href="/main.css" />

<!--Profile CSS-->

<link rel="stylesheet" type="text/css" href="../stylesheets/profile.css" />

<?php
    if ($_SESSION['loggedin'] == false) {
        $_SESSION['username'] = '';
    }
?>

</head>

<body>
<br><br><br><br>
<div class='profilebox'>
	<h2><?php echo $_SESSION['username']; ?></h2><hr>

	<label for='fileToUpload'>Profile picture</label><br>

	<img id='preview' src="<?php echo $_SESSION['uploadedFile']; ?>" height='120px' width='135px' /><br>

	<?php include 'uploadPic.php'; ?>

	<?php
	echo $_SESSION['uploadError'];
	$_SESSION['uploadError'] = '';
	?>

</div>

<div class='settingsbox'>
	<h2>Settings</h2>
	<hr>
	
	<p><b>First Name:</b> <?php echo $firstname; ?></p><hr>
	<p><b>Last Name:</b> <?php echo $lastname; ?></p><hr>
	<p><b>Email:</b> <?php echo $email; ?> <b><a href='changeEmail.php'>Change</a></b></p><hr>
	<p><b>Username:</b> <?php echo $username; ?></p><hr>
	<p><b>Password:</b> <?php echo $password; ?> <b><a href='changePassword.php'>Change</a></b></p>
</div>









</body>
</html>