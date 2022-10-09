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
		<title>Wownet / User registry</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="/imgdb/ico/nyan.ico"/>
		<link rel="stylesheet" type="text/css" href="wownet.css"/>
	</head>

	<body>
		<header>
		<p style="text-align:right"><img src="<?php echo $path.$img ?>" width="600" height="200"/><br/><a href="/wownet/">Mainpage</a>/<a href="imgdb.php">Image database</a>/<a href="user.php">User settings</a></p>
		</header>

		<section>
			<br/><br/><br/>
			<form name="register" method="post" action="/equipment/register.php">
				<table width="600" border="0" align="center">
				<tr>
					<td colspan="2"><strong>Registration form:</strong></td>
				</tr>

				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" maxlength="32"/></td>
				</tr>

				<tr>
					<td>Password:</td>
					<td><input type="password" name="password1"/></td>
				</tr>

				<tr>
					<td>Confirm password:</td>
					<td><input type="password" name="password2"/></td>
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Send registry form now!"/></td>
				</tr>
				</table>
			</form>
			<br/><br/><br/>
		</section>

		<footer>
		<p style="text-align:center">Wownet community/registry - Last updated: <?php $lastupd = filemtime("login.php"); print(date("M-d Y H:i", $lastupd)); ?></p>
		</footer>
	</body>
</html>
