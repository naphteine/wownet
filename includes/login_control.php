<?php
	if(!include_once("db_connect.php")) {
		header("Location: /wownet/error.php");
	}

	CREATE TABLE IF NOT EXIST 'userdb' (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(32) NOT NULL,
		password CHAR(128) NOT NULL,
		salt CHAR(128) NOT NULL,
		image CHAR(64),
		ipv4 INT,
		ipv6 BINARY(16),
		type INT(2),
		date_creation DATETIME,
		date_lastlogin DATETIME
	) ENGINE=InnoDB;
?>
