<?php

	define('APP', 'Forum');

	define('DB_HOST', 'localhost');
	define('DB_USER', 'master');
	define('DB_PASS', '1234');
	define('DB_NAME', 're_db');

	//make a database connection
	if(!$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME))
	{
		//echo "Connection Failed" . mysqli_connect_error();
		die("Could not connect to database");
	}

	date_default_timezone_set('America/Chihuahua');

?>