<?php

session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['uploadError'] = "file is not an image";
        $uploadOk = 0;
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['uploadError'] = "Sorry, file already exists.";
    $uploadOk = 0;
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
// Check file size
else if ($_FILES["fileToUpload"]["size"] > 500000) {
    $_SESSION['uploadError'] = "Sorry, your file is too large.";
    $uploadOk = 0;
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $_SESSION['uploadError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
// Check if $uploadOk is set to 0 by an error
else if ($uploadOk == 0) {
    $_SESSION['uploadError'] = "Sorry, your file was not uploaded.";
    header("Location: ".$_SERVER['HTTP_REFERER']);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $_SESSION['profilepic'] = basename($_FILES['fileToUpload']['name']);
        $_SESSION['uploadError'] = "Image uploaded successfully!";
        header("Location: ".$_SERVER['HTTP_REFERER']);

        $_SESSION['uploadedFile'] = '/pages/profile/uploads/'.$_SESSION['profilepic'];

        include '../../conn.php';

        $updatequery = "UPDATE myUsers SET profilepic = '$_SESSION[uploadedFile]' WHERE username = '$_SESSION[username]'";

        $data = mysql_query($updatequery);

        if (!$data) {
            $_SESSION['uploadError'] = 'Failed to add image to database';
        }

    } else {
        $_SESSION['uploadError'] = "Sorry, there was an error uploading your file.";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

}
?>