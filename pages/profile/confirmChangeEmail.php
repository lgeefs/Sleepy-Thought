<?php

session_start();

header("Location: " . $_SERVER['HTTP_REFERER']);

include '../../conn.php';

if (isset($_POST['submit'])) {
	changeEmail();
} else {
	echo "Failed";
}

function changeEmail() {

	$username = $_SESSION['username'];
	$password = $_POST['password'];

	$salt = substr($username, 1, 3);

	$password = crypt($password, $salt);

	$password = hash('sha512', $password);

	$query = ("SELECT * FROM myUsers WHERE username = '$username' AND password = '$password'") or die("Error");

	$result = mysql_query($query);

	if (!$row = mysql_fetch_array($result)) {
		$_SESSION['changeError'] = 'Failed to update email';
	} else {
		if ($_POST['newemail'] == $_POST['confirmnewemail']) {
			$insertquery = "UPDATE myUsers SET email = '$_POST[newemail]' WHERE username = '$username' AND password = '$password'";
			$data = mysql_query($insertquery) or die(mysql_error());

			if ($data) {
				$_SESSION['email'] = $_POST['newemail'];
				$_SESSION['changeError'] = 'Successfully updated email!';
			} else {
				$_SESSION['changeError'] = 'Failed to update email';
			}
		} else {
			$_SESSION['changeError'] = 'Failed to update email<br>Email addresses didn\'t match!';
		}
	}
}

	mysql_close($conn);


?>