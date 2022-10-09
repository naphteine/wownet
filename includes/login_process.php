<?php
	include_once 'db_connect.php';
	include_once 'login_functions.php';

	$session = new session();
	$session->start_session('_s', false);
	//$_SESSION['something'] = 'a value.';
	//echo $_SESSION['something'];

	if(isset($_POST['username'], $_POST['p'])) {
		$username = $_POST['username'];
		$password = $_POST['p'];

		if(login($username, $password, $mysqli) == true) {
			header('Location: ../protected_page.php');
		} else {
			header('Location: ../index.php?error=1');
		}
	} else {
		echo 'Invalid req.';
	}
?>
