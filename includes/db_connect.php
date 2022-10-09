<?php
	if(!include_once("db_config.php")) {
		header("Location: /wownet/error.php");
	}

	if(!include_once("login_config.php")) {
		header("Location: /wownet/error.php");
	}

	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if($mysqli->connect_error) {
		header("Location: /wownet/error.php");
	}
?>
