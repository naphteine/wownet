<?php
 echo "THIS SERVICE UNABLE FOR NOW.";
/*
 session_start();
 if(!isset($_SESSION['user']))
 {
	header("Location: /wownet/login.php");
 }

 $id = $_SESSION['user'];
 $connection = mysqli_connect('localhost', 'wowcat', 'wow8253mpW', 'wowdb');
 $query = "SELECT * FROM userdb WHERE id = '$id';";
 $result = mysqli_query($connection, $query);
 $usr_data = mysqli_fetch_array($result, MYSQLI_ASSOC);

 if(usr_data["id"] != $id)
 {
	header("Location: /wownet/");
 }

 $img_id = $_POST["imgid"];
 $query = "SELECT * FROM imgdb WHERE id = '$img_id';";
 $result = mysqli_query($connection, $query);
 $img_data = mysqli_fetch_array($result, MYSQLI_ASSOC);

 $target_dir = "../imgdb/uploads/";
 $target_file = $target_dir.basename($img_data["file_name"]);
 if(!file_exists($target_file))
 {
	echo "File not exist already!";
 }

 unlink($target_file);
 $query = "DELETE from imgdb WHERE id='$img_id';";
 mysqli_query($connection, $query);
 mysqli_close($connection);

 header("Location: /wownet/imgdb.php");*/
?>
