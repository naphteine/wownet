<?php
	if(!include_once("includes/image_functions.php")) {
		header("Location: /wownet/error.php");
	}

	$root = "/var/www/server/";
	$path = "/wownet/images/headers/";

	$headerArray = getImagesFromDir($root.$path);
	$randomImage = getRandomFromArray($headerArray);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Wownet community</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="images/ico/nyan.ico"/>
		<link rel="stylesheet" type="text/css" href="css/general.css"/>
		<link rel="stylesheet" type="text/css" href="css/blog.css"/>
	</head>

	<body>
		<header>
			<p style="text-align:right"><img src="<?php echo $path.$randomImage ?>" width="630" height="200"/>
			<br/><a class="header" href="/wownet/">Blog</a> <a class="header" href="/wownet/showcase.php">Showcase</a> <a class="header" href="/wownet/user.php">User page</a></p>
		</header>

		<section>
			<div class="ohnein">- THIS SERVICE IS DISABLED FOR NOW.  -</div>
		</section>
	</body>
</html>
