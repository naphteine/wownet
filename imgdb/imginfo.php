<?php
 session_start();

 if(!isset($_SESSION['user']))
 {
	header("Location: /wownet/imgdb.php");
 }

 $path = "/imgdb/header/";
 $root = "/var/www/wownet/";

 include("../equipment/img-functions.php");

 $imgList = getImagesFromDir($root . $path);
 $img = getRandomFromArray($imgList);

 if(isset($_GET['q']) && is_numeric($_GET['q'])) {
	$connection = mysqli_connect("localhost", "wowcat", "wow8253mpW", "wowdb");
	$id = $_GET['q'];
	$query = "SELECT * FROM imgdb WHERE id = '$id';";
	$result = mysqli_query($connection, $query);
	$data = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$usr_id = $data["uploader_id"];
	$query = "SELECT username FROM userdb WHERE id = '$usr_id'";
	$result = mysqli_query($connection, $query);
	$usr_data = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$usr_name = $usr_data["username"];
	mysqli_close($connection);

	$img_info = array($id, $data["file_name"], $usr_name, $data["upload_date"]);
 } else {
	header("Location: /wownet/imgdb.php");
 }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Wownet community - Image info</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="/imgdb/ico/nyan.ico"/>
		<link rel="stylesheet" type="text/css" href="../wownet/wownet.css"/>
	</head>

	<body>
		<header>
		<p style="text-align:right"><img src="<?php echo $path.$img ?>" width="600" height="200"/><br/><a href="/wownet/">Mainpage</a>/<a href="/wownet/imgdb.php">Image database</a>/<a href="/wownet/user.php">User settings</a></p>
		</header>

		<section>
		<br/><br/><br/>
		<table align=center>
			<tr>
				<td><a href='<?php echo "/imgdb/uploads/".$img_info[1]; ?>'><img src='<?php echo "/imgdb/uploads/".$img_info[1]; ?>'/></a></td>
				<td><div class="imgname"><?php echo $img_info[1]; ?></div>
				<div class="userinfo">Posted by:
					<?php echo "<a href='/wownet/user.php?q=".$usr_id."'>".$img_info[2]."</a>"; ?></div>
				<div class="userinfo">Posting date: <?php echo $img_info[3]; ?></div>
				<?php if($usr_id == $_SESSION['user']) {
					echo "<form action='/equipment/delete-img.php' method='post'><input type='hidden' name='imgid' value='".$img_info[0]."'><input type='submit' name='deleteItem' value='Delete this image'/></form>"; }
				?></td>
			</tr>
		</table>
		<br/><br/><br/>
		</section>

		<footer>
		<p style="text-align:center">Wownet community/image info - Last updated:<?php $lastupd = filemtime("imginfo.php"); print(date("M-d Y H:i", $lastupd)); ?></p>
		</footer>
	</body>
</html>
