<?php


function RedirectTo($new_location){
  header("Location: " .  $new_location);
  exit;
}

function MysqlPrep($string) {
  global $db;
  $escaped_string = mysqli_real_escape_string($db, $string);
  return $escaped_string;
}


function ConfirmQuery ($result_set) {
	
	      if (!$result_set) {
	 	die ("Database query failed");
	}
}

function FormErrors($errors=array()) {
    $output = "";
    if (!empty($errors)) {
      $output .= "<div class=\"error\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach ($errors as $key => $error) {
        $output .= "<li>";
        $output .= htmlentities($error);
        $output .= "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
  }

function FindAllSubjects (){
	global $db;

	$query = "SELECT * ";
	$query .= "FROM subjects ";
	// $query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";
            $result = mysqli_query($db, $query);
	ConfirmQuery($result);
	return $result;
}

function PagesForSubjects ($subject_id) {
	global $db;
      $safe_subject_id = mysqli_real_escape_string($db, $subject_id);

	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE visible = 1 ";
	$query .= "AND subject_id = {$safe_subject_id} ";
	$query .= "ORDER BY position ASC";
            $page_set = mysqli_query($db, $query);
	ConfirmQuery($page_set);
	return $page_set;
}

function FindSubjectById ($subject_id) {
	global $db;
	$safe_subject_id = mysqli_real_escape_string($db, $subject_id);

	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE id = {$safe_subject_id}    ";
	$query .= "LIMIT 1";
            $subject_set = mysqli_query($db, $query);
	ConfirmQuery($subject_set);
	if ($subject = mysqli_fetch_assoc($subject_set)) {
		return $subject;
	} else { 
		return null;
	}
}

function FindPageById ($page_id) {
	global $db;

	$safe_page_id = mysqli_real_escape_string($db, $page_id);

	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE id = {$safe_page_id}    ";
	$query .= "LIMIT 1";
            $page_set = mysqli_query($db, $query);
	ConfirmQuery($page_set);
	if ($page = mysqli_fetch_assoc($page_set)) {
		return $page;
	} else { 
		return null;
	}
}

function FindSelectedPage(){
	global $current_subject;
	global $current_page;
     if (isset($_GET["subject"])) {
      $current_subject = FindSubjectById($_GET["subject"]);
      $current_page = null;
   } elseif (isset($_GET["page"])) {
      $current_page = FindPageById($_GET["page"]);
   	$selected_subject_id = null;
      $current_subject = null;
   } else {
      $current_subject = null;
       $current_page = null;
   }
}

function FindSelectedContent($page_id, $symbols_number){
     $current_page = FindPageById($page_id);
     $selected_content = substr($current_page["content"], 0, $symbols_number) . "...";
     return $selected_content;
}

function FindSelectedPageTitle($page_id){
     $current_page = FindPageById($page_id);
     $selected_title = $current_page["menu_name"];
     return $selected_title;
}

function FindSelectedSubjectTitle($subject_id){
     $current_subject = FindSubjectById($subject_id);
     $selected_title = $current_subject["menu_name"];
     return $selected_title;
}


// Selected item ID if any and selected page ID if any -> array or null
function Navigation($subject_array, $page_array){

    $output = "<ul class=\"subjects\">";
    $subject_set = FindAllSubjects();
     while($subject = mysqli_fetch_assoc($subject_set)) {
         $output .= "<li";
                  if ($subject_array && $subject["id"] == $subject_array["id"]) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
          $output .= "<a href=\"manage_content.php?subject=";
          $output .=  urlencode($subject["id"]); 
          $output .=  "\">"; 
          $output .=   htmlentities($subject["menu_name"]);
          $output .=  "</a>";
          
          $page_set = PagesForSubjects($subject["id"]); 
          $output .= "<ul class=\"pages\">";
          while($page = mysqli_fetch_assoc($page_set)) {
              $output .=  "<li";
                  if ($page_array &&  $page["id"] == $page_array["id"]) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
                   $output .= "<a href=\"manage_content.php?page=";
                   $output .=  urlencode($page["id"]); 
                   $output .= "\">";
                   $output .=  htmlentities($page["menu_name"]); 
                   $output .= "</a></li>";
              }
            mysqli_free_result($page_set);
            $output .= "</ul></li>"; 
      }
     	mysqli_free_result($subject_set);
    	$output .= "</ul>";

    	return $output;
}

function MainNavigation($subject_array, $page_array){

    $output = "<ul class=\"subjects\">";
    $subject_set = FindAllSubjects();
     while($subject = mysqli_fetch_assoc($subject_set)) {
         $output .= "<li";
                  if ($subject_array && $subject["id"] == $subject_array["id"]) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
          $output .= "<a href=\"manage_content.php?subject=";
          $output .=  urlencode($subject["id"]); 
          $output .=  "\">"; 
          $output .=   htmlentities($subject["menu_name"]);
          $output .=  "</a>";
          
          $page_set = PagesForSubjects($subject["id"]); 
          $output .= "<ul class=\"pages\">";
          while($page = mysqli_fetch_assoc($page_set)) {
              $output .=  "<li";
                  if ($page_array &&  $page["id"] == $page_array["id"]) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
                   $output .= "<a href=\"page_content.php?page=";
                   $output .=  urlencode($page["id"]); 
                   $output .= "\">";
                   $output .=  htmlentities($page["menu_name"]); 
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
