<?php

session_start();

header("Location: /index.php");


include '../../conn.php';


if (mysqli_connect_errno($conn)) {
	echo "Connect failed";
} else {
	echo "Connect success";
}



function newUser() {
	
	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$email = mysql_real_escape_string($_POST['email']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$confirmpass = mysql_real_escape_string($_POST['confirmpass']);

	if ($password != $confirmpass) {

		echo "Error: passwords do not match";

	} else if ((empty($firstname)) || (empty($lastname)) || (empty($email)) || (empty($username)) || (empty($password))) {

		echo "Error: Fill in required field";

	} else if ((strlen($username) < 4) || (strlen($password) < 4)) {

		echo "Username & password need to be at least 5 characters long";

	} else {

		$salt = substr($username, 1, 3);

		$password = crypt($password, $salt);

		$password = hash('sha512', $password);

		$query = "INSERT INTO myUsers (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";

		$data = mysql_query($query) or die(mysql_error());

		if ($data) {
			echo "Registration complete!";
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['uploadedFile'] = 'https://www.drupal.org/files/profile_default.png';
			$_SESSION['loggedin'] = true;
		} else {
			echo "Registration failed";
		}

	}

}


function signUp() {

	if (!empty($_POST['username'])) {

		$query = mysql_query("SELECT * FROM myUsers WHERE username = '$_POST[username]'") or die(mysql_error());


		if (!$row = mysql_fetch_array($query)) {
			
			echo "Processing";
			newUser();
			
		} else {

			echo "Sorry, this username has already been used";

		}


	} else {
		echo "username is empty!";
	}

}


if (isset($_POST['submit'])) {
	echo "isset";
	signUp();
} else {
	echo "isn't set";
}


mysql_close($conn);




?>