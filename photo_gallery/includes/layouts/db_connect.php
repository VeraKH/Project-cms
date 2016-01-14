<?php
	$dbhost = "localhost"; //  ip, domain...
	$dbuser = "monster_cms";
	$dbpass = "beast";
	$dbname = "monsters_corp";

	$db = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	 if (mysqli_connect_errno()) {
	 	die ("Database connection failed: "  . 
	 		mysqli_connect_error() . 
	 		" (" . mysqli_connect_errno() . ") "
	   	);
	}
?>