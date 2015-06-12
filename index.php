<?php

session_start();

if ($_SESSION['visit'] == 1) {
    header("Location: /pages/categories/allcategories.php");
    $_SESSION['visit'] = 2;
} else {
    $_SESSION['visit'] = 1;

    //HIT COUNTER///////////////////

    $fp = fopen("stats.txt","a+");
    $count = fread($fp, 10);
    $count = $count+1;
    echo '<div class="hits">'.$count.'</div>';
    fclose($fp);
    $fp = fopen("stats.txt","w+");
    fwrite($fp, $count, 10);
    fclose($fp);
}


?>

<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sleepy Thought</title>

<!--Bootstrap CSS-->

<link rel="stylesheet" href="bootstrap.min.css"/>

<!--Font files-->


<!--Main CSS File-->

<link rel="stylesheet" href="main.css"/>

<?php
    if ($_SESSION['loggedin'] == false) {
        $_SESSION['username'] = '';
    }
?>

</head>

<body>


	<?php include 'header.html'; ?>


	<div class="jumbotron">
   	 	<div class="container">
        	<br><br><br><br><br><br><br><br><br><br>
        	<h1>Reveal your dreams...<br>To the WORLD.</h1>
        	<p>Confess your fantasies...<br>
        	Admit your unordinary dreams...<br>
        	Tag your friends if they cross your thoughts!</p>
        	<a href="pages/register/register.php">Create an account</a> or 
        	<a href="pages/login/login.php">Login</a><br><br><br>
        	<!--Footer-->
        	<p id='footer'>SleepyThought &copy; 2015</p>
    	</div>
	</div>
    




</body>

</html>