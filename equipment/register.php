<?php
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if($password1 != $password2)
		header('Location: /wownet/register.php');

	if(strlen($username) > 32)
		header('Location: /wownet/register.php');

	$hash = hash('sha256', $password1);

	function createSalt()
	{
		$text = md5(uniqid(rand(), true));
		return substr($text, 0, 8);
	}

	$salt = createSalt();
	$password = hash('sha256', $salt . $hash);
	$connection = mysqli_connect('localhost', 'wowcat', 'wow8253mpW', 'wowdb');
	$username = mysqli_real_escape_string($connection, $username);
	$creation_date = date("Y-m-d H:i:s");

	$query = "INSERT INTO userdb (image, username, password, salt, type, creation_date)
			VALUES ('lolnewfag.png', '$username', '$password', '$salt', '0', '$creation_date');";

	mysqli_query($connection, $query);
	mysqli_close($connection);
	header('Location: /wownet/login.php');
?>
