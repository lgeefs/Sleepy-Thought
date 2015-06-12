<?php
session_start();
header("Location: " . $_SERVER['HTTP_REFERER']);


if (isset($_POST['submit'])) {
	$_SESSION['order'] = $_POST['order'];
}

?>