<?php

session_start();

header("Location: " . $_SERVER['HTTP_REFERER']);

include '../../conn.php';

if (isset($_POST['submit'])) {
	changePassword();
} else {
	echo "Failed";
}

function changePassword() {

	$username = $_SESSION['username'];
	$password = $_POST['password'];

	$salt = substr($username, 1, 3);

	$password = crypt($password, $salt);

	$password = hash('sha512', $password);

	$newpassword = $_POST['newpassword'];

	$newpassword = crypt($newpassword, $salt);

	$newpassword = hash('sha512', $newpassword);

	$query = ("SELECT * FROM myUsers WHERE username = '$username' AND password = '$password'") or die("Error");

	$result = mysql_query($query);

	if (!$row = mysql_fetch_array($result)) {
		$_SESSION['changeError'] = 'Failed to update password';
	} else {
		if ($_POST['newpassword'] == $_POST['confirmnewpassword']) {
			$insertquery = "UPDATE myUsers SET password = '$newpassword' WHERE username = '$username' AND password = '$password'";
			$data = mysql_query($insertquery) or die(mysql_error());

			if ($data) {
				$_SESSION['password'] = $_POST['newpassword'];
				$_SESSION['changeError'] = 'Successfully updated password!';
			} else {
				$_SESSION['changeError'] = 'Failed to update password';
			}
		} else {
			$_SESSION['changeError'] = 'Failed to update password<br>Passwords didn\'t match!';
		}
	}
}

	mysql_close($conn);


?>