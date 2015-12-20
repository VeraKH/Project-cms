<?php

function ConfirmQuery ($result_set) {
	
	      if (!$result_set) {
	 	die ("Database query failed");
	}
}

function FindAllSubjects (){
	global $db;

	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";
            $result = mysqli_query($db, $query);
	ConfirmQuery($result);
	return $result;
}

function PagesForSubjects ($subject_id) {
	global $db;

	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE visible = 1 ";
	$query .= "AND subject_id = {$subject_id} ";
	$query .= "ORDER BY position ASC";
            $page_set = mysqli_query($db, $query);
	ConfirmQuery($page_set);
	return $page_set;
}


?>
