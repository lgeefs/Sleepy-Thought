<?php

session_start();

header("Location: " . $_SERVER['HTTP_REFERER']);

include '../../conn.php';

if (empty($_SESSION['username'])) {
	$_SESSION['error'] = true;
} else if (isset($_POST['submit'])) {
	addPost();
}


function addPost() {

	$username = mysql_real_escape_string($_SESSION['username']);
	$paragraph = mysql_real_escape_string($_POST['paragraph']);
	$tag = mysql_real_escape_string($_POST['tag']);
	$profilepic = mysql_real_escape_string($_SESSION['uploadedFile']);

	$query = "INSERT INTO forumPosts (username, paragraph, tag, profilepic) VALUES ('$username', '$paragraph', '$tag', '$profilepic')";

	$data = mysql_query($query) or die(mysql_error());

	if ($data) {
		echo "Comment successfully posted!";
	} else {
		echo "Error: Commment not posted. Please try again";
	}


}


?>