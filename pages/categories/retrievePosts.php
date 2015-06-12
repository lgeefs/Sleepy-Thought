<form id='go' action='retrievePostsOrder.php' method='post'>
<input type='radio' name='order' value='new' <?php if ($_SESSION['order'] == 'new') {echo 'checked';} ?> /> Newest 
<input type='radio' name='order' value='old' <?php if ($_SESSION['order'] == 'old') {echo 'checked';} ?> /> Oldest 
<button type='submit' name='submit' value='submit'>Go</button>
</form>

<div class='forumposts'>
<?php

$query = "SELECT * FROM forumPosts";

$data = mysql_query($query);

$numRows = mysql_num_rows($data);

if (($_SESSION['order'] == 'new') || (empty($_SESSION['order']))) {


	for ($i = $numRows - 1; $i >= 0; $i--) {
		$printUsername = mysql_result($data, $i, 'username');
		$printParagraph = mysql_result($data, $i, 'paragraph');
		$printTimestamp = mysql_result($data, $i, 'ts');
		$printPostID = mysql_result($data, $i, 'userID');
		$printTag = mysql_result($data, $i, 'tag');
		$printPicture = mysql_result($data, $i, 'profilepic');

		if (($pagename == $printTag) || ($pagename == 'all')) {
			?>Posted by: <strong> <?php echo $printUsername; ?> </strong><img src="<?php echo $printPicture; ?>" height="35px" width="35px" /> in <strong> <?php echo $printTag; ?> </strong><br> <?php
			echo '<p>' . $printParagraph . '</p>';
			echo $printTimestamp . '<br>';
			echo 'Post ID: 0000' . $printPostID . '<br><hr>';

		}

	}

} else if ($_SESSION['order'] == 'old') {

	for ($i = 0; $i < $numRows; $i++) {
		$printUsername = mysql_result($data, $i, 'username');
		$printParagraph = mysql_result($data, $i, 'paragraph');
		$printTimestamp = mysql_result($data, $i, 'ts');
		$printPostID = mysql_result($data, $i, 'userID');
		$printTag = mysql_result($data, $i, 'tag');
		$printPicture = mysql_result($data, $i, 'profilepic');

		if (($pagename == $printTag) || ($pagename == 'all')) {
			?>Posted by: <strong> <?php echo $printUsername; ?> </strong><img src="<?php echo $printPicture; ?>" height="35px" width="35px" /> in <strong> <?php echo $printTag; ?> </strong><br> <?php
			echo '<p>' . $printParagraph . '</p>';
			echo $printTimestamp . '<br>';
			echo 'Post ID: 0000' . $printPostID . '<br><hr>';

		}

	}

}


$_SESSION['order'] = 'new';

?>
</div>
