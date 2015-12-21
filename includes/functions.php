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

// Selected item ID if any and selected page ID if any
function Navigation($subject_id, $page_id){

    $output = "<ul class=\"subjects\">";
    $subject_set = FindAllSubjects();
     while($subject = mysqli_fetch_assoc($subject_set)) {
         $output .= "<li";
                  if ($subject["id"] == $subject_id) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
          $output .= "<a href=\"manage_content.php?subject=";
          $output .=  urlencode($subject["id"]); 
          $output .=  "\">"; 
          $output .=   $subject["menu_name"];
          $output .=  "</a>";
          
          $page_set = PagesForSubjects($subject["id"]); 
          $output .= "<ul class=\"pages\">";
          while($page = mysqli_fetch_assoc($page_set)) {
              $output .=  "<li";
                  if ($page["id"] == $page_id) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
                   $output .= "<a href=\"manage_content.php?page=";
                   $output .=  urlencode($page["id"]); 
                   $output .= "\">";
                   $output .=  $page["menu_name"]; 
                   $output .= "</a></li>";
              }
            mysqli_free_result($page_set);
            $output .= "</ul></li>"; 
      }
     	mysqli_free_result($subject_set);
    	$output .= "</ul>";

    	return $output;
}


?>
