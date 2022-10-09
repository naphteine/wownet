<?php
	$error_msg = array();
	if(isset($_GET['q']) && is_numeric($_GET['q'])) {
		$status = array(
			400 => array("400 Bad Request", "The request cannot be fulfilled due to bad syntax."),
			401 => array("401 Login error", "Username and/or password incorrect."),
			403 => array("403 Forbidden", "You don't have permission for this page/folder."),
			404 => array("404 Page not exist", "This page is deleted, moved, hiding or missing."),
			405 => array("405 Method not allowed", "This method specified in the Request-Line is not allowed for the spesified resource."),
			408 => array("408 Request timeout", "Your browser failed to send a request in the time allowed by the server."),
			414 => array("414 URL too long", "The URL you entered is longer than the maximum length."),
			500 => array("500 Internal server error", "The request was unsuccessful due to an unexpected condition encountered by the server."),
			502 => array("502 Bad gateway", "The server received an invalid response from the upstream server while trying to fulfill the request."),
			504 => array("504 Gateway timeout", "The upstream server failed to send a request in the time allowed by the server."),
		);

		$error_msg = $status[$_GET['q']];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ow shit ow shit ow shit</title>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="images/ico/ohnein.ico"/>
		<link rel="stylesheet" type="text/css" href="/wownet/css/general.css"/>
		<link rel="stylesheet" type="text/css" href="/wownet/css/error.css"/>
	</head>

	<body>
		<br/><br/><br/><br/><br/><br/>
		<p id="sorry">SORRY!</p>
		<p id="message">
		<?php
			if(!empty($error_msg)) {
				foreach($error_msg as $err) {
					echo $err.'<br/>';
				}
			}
			else {
				echo "Server encountered an unexpected error or you're a jerk, how you come in here?";
			}
		?>

		<br/>Go to the <a href="javascript: history.back()">previous page</a> or <a href="/wownet/">wownet community mainpage</a>.</p>
	</body>
</html>
