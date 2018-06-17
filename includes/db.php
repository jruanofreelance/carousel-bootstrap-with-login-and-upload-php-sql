<?php
	define("DB_HOST" , "localhost");
	define("DB_USER" , "userDb");
	define("DB_PASS" , "passDb");
	define("DB_NAME" , "nameDb");

	$db = new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);
	if(!$db){ echo 'An error has occurred <br/>'.mysqli_connect_error(); }
?>