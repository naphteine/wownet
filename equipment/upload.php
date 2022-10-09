<?php
 session_start();
 if(!isset($_SESSION['user']))
 {
	header("Location: /wownet/login.php");
 }

 $target_dir = "../imgdb/uploads/";
 $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;
 $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

 // Check if image file is an actual image or fake image
 if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		echo "File is an ".$check["mime"].". ";
		$uploadOk = 1;
	} else {
		echo "File is not an image. ";
		$uploadOk = 0;
	}
 }

 if(file_exists($target_file)) {
	echo "File already exist! ";
	$uploadOk = 0;
 }

 if($_FILES["fileToUpload"]["size"] > 8000000) {
	echo "File size is too large! ";
	$uploadOk = 0;
 }

 if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif") {
	echo "Only JPG, JPEG, PNG and GIF files allowed! ";
	$uploadOk = 0;
 }

 if($uploadOk == 0) {
	echo "Sorry, your file wasn't uploaded!";
 } else {
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$connection = mysqli_connect('localhost', 'wowcat', 'wow8253mpW', 'wowdb');
		$creation_date = date("Y-m-d H:i:s");
		$file_name = $_FILES["fileToUpload"]["name"];
		$user_id = $_SESSION["user"];
		$query = "INSERT INTO imgdb (file_name, uploader_id, upload_date) VALUES ('$file_name', '$user_id', '$creation_date');";
		mysqli_query($connection, $query);
		mysqli_close($connection);

		header("Location: /wownet/imgdb.php");
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
 }
?>
