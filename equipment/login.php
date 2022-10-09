<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	$connection = mysqli_connect('localhost', 'wowcat', 'wow8253mpW', 'wowdb');

	$username = mysqli_real_escape_string($connection, $username);
	$query = "SELECT password, salt, type FROM userdb WHERE username = '$username';";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) == 0) // User not found
	{
		header('Location: /wownet/login.php');
	}

	$userData = mysqli_fetch_array($result, MYSQL_ASSOC);
	$hash = hash('sha256', $userData['salt'] . hash('sha256', $password));

	if($hash != $userData['password']) // Incorrect password
	{
		header('Location: /wownet/login.php');
	}
	else if($userData['type'] == '0')
	{
		header('Location: /wownet/login.php');
	}
	else
	{
		function ipVersion($txt) {
			return strpos($txt, ":") === false ? 4 : 6;
		}

		$address = $_SERVER["REMOTE_ADDR"];
		$ipver = ipVersion($address);
		$date = date("Y-m-d H:i:s");

		if($ipver == '4')
		{
			$ipv4 = ip2long($address);
			$query = "UPDATE userdb SET last_login = '$date', ipv4 = '$ipv4' WHERE userdb.username = '$username'";
		}
		else if($ipver == '6')
		{
			$ipv6 = inet_pton($address);
			$query = "UPDATE userdb SET last_login = '$date', ipv6 = '$ipv6' WHERE userdb.username = '$username'";
		}
		mysqli_query($connection, $query);

		$query = "SELECT id FROM userdb WHERE username = '$username';";
		$result = mysqli_query($connection, $query);
		$usr_info = mysqli_fetch_array($result, MYSQLI_NUM);
		session_start();
		$_SESSION['user'] = $usr_info[0];
		header('Location: /wownet/index.php');
	}
	mysqli_close($connection);
?>
