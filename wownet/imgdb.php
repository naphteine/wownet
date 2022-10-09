<?php
 $path = "/imgdb/header/";
 $root = "/var/www/wownet/";

 include("../equipment/img-functions.php");

 $imgList = getImagesFromDir($root . $path);
 $img = getRandomFromArray($imgList);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Wownet community - Image database</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="/imgdb/ico/nyan.ico"/>
		<link rel="stylesheet" type="text/css" href="wownet.css"/>
	</head>

	<body>
		<header>
		<p style="text-align:right"><img src="<?php echo $path.$img ?>" width="600" height="200"/><br/><a href="/wownet/">Mainpage</a>/<a href="imgdb.php">Image database</a>/<a href="user.php">User settings</a></p>
		<?php
			session_start();
			if(isset($_SESSION['user']))
			{
				echo "<form action='/equipment/upload.php' method='post' enctype='multipart/form-data' style='text-align:right; color:#009BFF'><input type='file' name='fileToUpload' id='fileToUpload'><input type='submit' value='Upload' name='submit'></form>";
			}
		?></header>

		<section>
		<br/><br/><br/><center>
		<?php
			sortAsImageFromDB("imgdb");
		?><br/><br/><br/></center>
		</section>

		<footer>
		<p style="text-align:center">Wownet community/imgdb - Last updated: <?php $lastupd = filemtime("imgdb.php"); print(date("M-d Y H:i", $lastupd)); ?></p>
		</footer>
	</body>
</html>
