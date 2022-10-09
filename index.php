<?php
 $path = "/imgdb/mainpage/";
 $root = "/var/www/wownet/";

 function getImagesFromDir($path) {
	$images = array();

	if($img_dir = @opendir($path)) {
		while(false !== ($img_file = readdir($img_dir))) {
			if(preg_match("/(\.gif|\.jpg|\.png)$/", $img_file)) {
				$images[] = $img_file;
			}
		}
		closedir($img_dir);
	}
	return $images;
 }

 function getRandomFromArray($ar) {
	$num = array_Rand($ar);
	return $ar[$num];
 }

 $imgList = getImagesFromDir($root . $path);
 $img = getRandomFromArray($imgList);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Wownet - Intranet mainpage</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="/imgdb/ico/nyan.ico"/>
		<link rel="stylesheet" type="text/css" href="general.css"/>
	</head>

	<body>
	 	<header>
		<p style="font-family:verdana;">Have no fear, <i>Wownet</i> is here!</p>
	  	</header>

	  	<section>
		<br/><br/><br/><br/>
		<p style="text-align:center"><img src="<?php echo $path.$img ?>"/></p>
		<br/><br/><br/>
	  	</section>

		<footer>
		<p style="font-family:verdana; text-align:center">Wownet intranet/index - Last updated: <?php $lastupd=filemtime("index.php");
										print(date("M Y", $lastupd)); ?></p>
		</footer>
	</body>
</html>
