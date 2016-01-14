<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "monster_cms");
	define("DB_PASS", "beast");
	define("DB_NAME", "monsters_corp");

	$db = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	 if (mysqli_connect_errno()) {
	 	die ("Database connection failed: "  . 
	 		mysqli_connect_error() . 
	 		" (" . mysqli_connect_errno() . ") "
	   	);
	}
?>