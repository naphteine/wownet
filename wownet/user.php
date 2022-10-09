<?php
 session_start();
 if(!isset($_SESSION['user']))
 {
	header('Location: /wownet/login.php');
 }

 $path = "/imgdb/header/";
 $root = "/var/www/wownet/";

 include("../equipment/img-functions.php");

 $imgList = getImagesFromDir($root . $path);
 $img = getRandomFromArray($imgList);

 if(isset($_GET['q']) && is_numeric($_GET['q'])) {
	$id = $_GET['q'];
 } else {
	$id = $_SESSION['user'];
 }

 $connection = mysqli_connect("localhost", "wowcat", "wow8253mpW", "wowdb");
 $query = "SELECT * FROM userdb WHERE id = '$id';";
 $result = mysqli_query($connection, $query);
 $usr_data = mysqli_fetch_array($result, MYSQLI_ASSOC);
 mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Wownet community - User mainpage</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="/imgdb/ico/nyan.ico"/>
		<link rel="stylesheet" type="text/css" href="wownet.css"/>
	</head>

	<body>
		<header>
		<p style="text-align:right"><img src="<?php echo $path.$img ?>" width="600" height="200"/><br/><a href="/wownet/">Mainpage</a>/<a href="imgdb.php">Image database</a>/<a href="user.php">User settings</a><?php if($id == $_SESSION['user']) { echo " [<a href='logout.php'>Logout</a>]"; } ?></header>

		<section>
		<br/><br/><br/>
		<table align=center>
			<tr>
				<td><img src='<?php $path = "/imgdb/profile/";  echo $path.$usr_data['image']; ?>'/></td>
				<td><div class="username"><?php echo $usr_data['username']; ?></div>
				<?php if($id == $_SESSION['user']) {
					echo "<div class='userinfo'>IP Address: ".long2ip($usr_data['ipv4']).inet_pton($usr_data['ipv6'])."</div>";
				} ?>
				<div class="userinfo">Last login: <?php echo $usr_data['last_login']; ?></div>
				<div class="userinfo">Account creation date: <?php echo $usr_data['creation_date']; ?></div>
				<?php if($id == $_SESSION['user']) {
					echo "<form action='/equipment/profile-upload.php' method='post' enctype='multipart/form-data' style='color:#009BFF'><input type='file' name='fileToUpload' id='fileToUpload'><input type='submit' value='Upload' name='submit'></form>";
				} ?></td>
			</tr>
		</table>
		<br/><br/><br/>
		</section>

		<footer>
		<p style="text-align:center">Wownet community/user mainpage - Last updated: <?php $lastupd = filemtime("user.php"); print(date("M-d Y H:i", $lastupd)); ?></p>
		</footer>
	</body>
</html>
