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
		<title>Wownet community - Mainpage</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="/imgdb/ico/nyan.ico"/>
		<link rel="stylesheet" type="text/css" href="wownet.css"/>
	</head>

	<body>
		<header>
		<p style="text-align:right"><img src="<?php echo $path.$img ?>" width="600" height="200"/><br/><a href="/wownet/">Mainpage</a>/<a href="imgdb.php">Image database</a>/<a href="user.php">User settings</a></p>
		</header>

		<section>
		<br/><br/><br/><center>
		<?php showAllImagesFromDir("../imgdb/"); ?>
		<br/><br/><br/></center>
		</section>

		<footer>
		<p style="text-align:center">Wownet community/mainpage - Last updated: <?php $lastupd = filemtime("index.php"); print(date("M-d Y H:i", $lastupd)); ?></p>
		</footer>
	</body>
</html>
