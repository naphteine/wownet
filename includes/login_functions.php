<?php
	function login($username, $password, $mysqli) {
		if($stmt = $msyqli->prepare("SELECT id, username, password, salt
			FROM users WHERE username = ? LIMIT 1")) {
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();

			$stmt->bind_result($user_id, $db_password, $salt);
			$stmt->fetch();

			$password = hash('sha512', $password . $salt);
			if($stmt->num_rows == 1) {
				if(checkbrute($user_id, $mysqli == true) {
					return false;
				} else {
					if($db_password == $password) {
						$user_browser = $_SERVER['HTTP_USER_AGENT'];
						$user_id = preg_replace("/[^0-9]+/", "", $user_id);
						$_SESSION['user_id'] = $user_id;
						$username = preg_replace("/[^a-<A-Z0-9_\-]+/", "", $username);
						$_SESSION['username'] = $username;
						$_SESSION['login_string'] = hash('sha512', $password . $user_browser);

						return true;
					} else {
						$now = time();
						$mysqli->query("INSERT INTO login_attempts(user_id, time)
							VALUES ('$user_id', '$now')");
						return false;
					}
				}
			} else {
				return false;
			}
		}
	}

	function checkbrute($user_id, $mysqli) {
		$now = time();
		$valid_attempts = $now - (2 * 60 * 60);

		if($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id ? AND time > '$valid_attempts')) {
			$stmt->bind_param('i', $user_id);
			$stmt->execute();
			$stmt->store_result();

			if($stmt->nuw_rows > 5) {
				return true;
			} else {
				return false;
			}
		}
	}

	function login_check($mysqli) {
		if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
			$user_id = $_SESSION['user_id'];
			$login_string = $_SESSION['login_string'];
			$username = $_SESSION['username'];

			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			if($stmt = $mysqli->prepare("SELECT password FROM users WHERE id = ? LIMIT 1")) {
				$stmt->bind_param('i', $user_id);
				$stmt->execute();
				$stmt->store_result();

				if($stmt->num_rows == 1) {
					$stmt->bind_result($password);
					$stmt->fetch();
					$login_check = hash('sha512', $password . $user_browser);

					if($login_check == $login_string) {
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function esc_url($url) {
		if('' == $url) {
			return $url;
		}

		$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
		$strip = array('%0d', '%0a', '%0D', '%0A');
		$url = (string)$url;

		$count = 1;
		while($count) {
			$url = str_replace($strip, '', $url, $count);
		}

		$url = str_replace(';//', '://', $url);
		$url = htmlentities($url);
		$url = str_replace('&amp;', '&#038;', $url);
		$url = str_replace("'", '&#039;', $url);

		if($url[0] !== '/') {
			return '';
		} else {
			return $url;
		}
	}
