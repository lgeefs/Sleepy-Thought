<?php

session_start();

include '../../conn.php';


if (isset($_POST['submit'])) {
	attemptLogin();
} else {
	header("Location: login.php");
}


function attemptLogin() {

	if ((empty($_POST['username'])) || (empty($_POST['password']))) {
		header("Location: login.php");
		$_SESSION['loginError'] = "Username or password field left empty!";
	} else {

		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);


		$salt = substr($username, 1, 3);

		$password = crypt($password, $salt);

		$password = hash('sha512', $password);


		$query = mysql_query("SELECT * FROM myUsers WHERE username = '$username' AND password = '$password'") or die(mysql_error());

		if (!$row = mysql_fetch_array($query)) {
			header("Location: login.php");
			$_SESSION['loggedin'] = false;
			$_SESSION['username'] = '';
			$_SESSION['loginError'] = 'Incorrect login information!';
		} else {
			header("Location: ../categories/allcategories.php");
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];

			if (!empty($row['profilepic'])) {
				$_SESSION['uploadedFile'] = $row['profilepic'];
			} else {
				$_SESSION['uploadedFile'] = 'https://www.drupal.org/files/profile_default.png';
			}

			$_SESSION['error'] = false;
			$_SESSION['loginError'] = '';
			echo "Welcome, you're successfully logged in!";
			echo '<br><br><br><a href="/index.php">Home</a>';

		}

	}

}

?>