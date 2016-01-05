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

function FindAllSubjects ($public =true){
	global $db;

	$query = "SELECT * ";
	$query .= "FROM subjects ";
      if ($public) {
        $query .= "WHERE visible = 1 ";
      }
	$query .= "ORDER BY position ASC";
            $result = mysqli_query($db, $query);
	ConfirmQuery($result);
	return $result;
}

function PagesForSubjects ($subject_id, $public=true ) {
	global $db;
      $safe_subject_id = mysqli_real_escape_string($db, $subject_id);

	$query = "SELECT * ";
	$query .= "FROM pages ";
      $query .= "WHERE subject_id = {$safe_subject_id}  ";
      if ($public) {
        $query .= "AND visible = 1 ";
      }
	$query .= "ORDER BY position ASC";
            $page_set = mysqli_query($db, $query);
	ConfirmQuery($page_set);
	return $page_set;
}

function FindAllAdmins (){
  global $db;

  $query = "SELECT * ";
  $query .= "FROM admins ";
  $query .= "ORDER BY username ASC";
   $admin_set  = mysqli_query($db, $query);
  ConfirmQuery($admin_set);
  return $admin_set ;
}

function FindSubjectById ($subject_id, $public = true) {
	global $db;
	$safe_subject_id = mysqli_real_escape_string($db, $subject_id);

	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE id = {$safe_subject_id}    ";
    if ($public) {
      $query .= "AND visible = 1 ";
      }
	$query .= "LIMIT 1";
            $subject_set = mysqli_query($db, $query);
	ConfirmQuery($subject_set);
	if ($subject = mysqli_fetch_assoc($subject_set)) {
		return $subject;
	} else { 
		return null;
	}
}

function FindPageById ($page_id, $public=true) {
	global $db;
	$safe_page_id = mysqli_real_escape_string($db, $page_id);
	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE id = {$safe_page_id}    ";
      if ($public) {
      $query .= "AND visible = 1 ";
      }
	$query .= "LIMIT 1";
      $page_set = mysqli_query($db, $query);
	ConfirmQuery($page_set);
	if ($page = mysqli_fetch_assoc($page_set)) {
		return $page;
	} else { 
		return null;
	}
}

function FindAdminById($admin_id) {
  global $db;
  $safe_admin_id = mysqli_real_escape_string($db, $admin_id);

  $query = "SELECT * ";
  $query .= "FROM admins ";
  $query .= "WHERE id = {$safe_admin_id}    ";
  $query .= "LIMIT 1";
  $admin_set = mysqli_query($db, $query);
  ConfirmQuery($admin_set);
  if ($admin = mysqli_fetch_assoc($admin_set)) {
    return $admin;
  } else { 
    return null;
  }
}

function FindPageForSubject($subject_id){
          $page_set = PagesForSubjects($subject_id);
          if ($first_page = mysqli_fetch_assoc($page_set)) {
                return $first_page;
          } else { 
                return null;
          }
}

function FindSelectedPage($public=false){
	global $current_subject;
	global $current_page;
     if (isset($_GET["subject"])) {
      $current_subject = FindSubjectById($_GET["subject"], $public);
      if ($current_subject && $public) {
        $current_page = FindPageForSubject($current_subject["id"]);
      } else {
         $current_page = null;
      }
   } elseif (isset($_GET["page"])) {
      $current_page = FindPageById($_GET["page"], $public);
   	$selected_subject_id = null;
      $current_subject = null;
   } else {
      $current_subject = null;
       $current_page = null;
   }
}

function FindSelectedContent($page_id, $symbols_number){
     $current_page = FindPageById($page_id);
     $selected_content = substr(htmlentities($current_page["content"]), 0, $symbols_number) . "...";
     return $selected_content;
}

function FindSelectedPageTitle($page_id){
     $current_page = FindPageById($page_id);
     $selected_title = htmlentities($current_page["menu_name"]);
     return $selected_title;
}

function FindSelectedSubjectTitle($subject_id){
     $current_subject = FindSubjectById($subject_id);
     $selected_title = htmlentities($current_subject["menu_name"]);
     return $selected_title;
}

/* Displaying only the first record. WHYYYYY???  OH, WHYYYYY? */
function AdminsList(){
              $admin_set = FindAllAdmins();
              while($admin = mysqli_fetch_assoc($admin_set)) {
                  $output = "<tr><td>";
                  $output .= htmlentities($admin["username"]);
                  $output .= "</td>";
                  $output .= "<td><a href=\"edit_admin.php?id=";
                  $output .= urlencode($admin["id"]); 
                  $output .= "\">Edit</a></td></tr>";
                  $output .= "<td><a href=\"delete_admin.php?id=";
                  $output .= urlencode($admin["id"]); 
                  $output .= "\">Delete</a></td></tr>";
              }
                  mysqli_free_result($admin_set);
                  return $output; 
}

// Selected item ID if any and selected page ID if any -> array or null
function Navigation($subject_array, $page_array, $public=true){
    $output = "<ul class=\"subjects\">";
     if (!$public) {
         $subject_set = FindAllSubjects(false);
      } 
    else {
      $subject_set = FindAllSubjects(true);
    }
     while($subject = mysqli_fetch_assoc($subject_set)) {
         $output .= "<li";
                  if ($subject_array && $subject["id"] == $subject_array["id"]) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
           if (!$public) {
                        $output .= "<a href=\"manage_content.php?subject=";
            } else {
                      $output .= "<a href=\"page_content.php?subject=";
            }         
        
          $output .=  urlencode($subject["id"]); 
          $output .=  "\">"; 
          $output .=   htmlentities($subject["menu_name"]);
          $output .=  "</a>";
          
          if (!$public) {
          $page_set = PagesForSubjects($subject["id"], false); 
        }else {
      $page_set = PagesForSubjects($subject["id"], true);
    }
          $output .= "<ul class=\"pages\">";
          while($page = mysqli_fetch_assoc($page_set)) {
              $output .=  "<li";
                  if ($page_array &&  $page["id"] == $page_array["id"]) { 
                    $output .=  " class=\"selected\" ";
                  } 
                    $output .=  ">"; 
            if (!$public) {
                  $output .= "<a href=\"manage_content.php?page=";
            }
            else {
              $output .= "<a href=\"page_content.php?page=";
            }
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

function PasswordEncrypt($password){
          $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
          $salt_length = 22;          // Blowfish salts should be 22-characters or more
          $salt = GenerateSalt($salt_length);
          $format_and_salt = $hash_format . $salt;
          $hash = crypt($password, $format_and_salt);
          return $hash;
}



function GenerateSalt($length){

    $unique_random_string = md5(uniqid(mt_rand(), true));
    $base64_string = base64_encode($unique_random_string);
    $modified_based_string = str_replace("+", ".", $base64_string);
    $salt = substr($modified_based_string, 0, $length);

    return $salt; 
}

function PasswordCheck($password, $existing_hash) {
    $hash = crypt($password, $existing_hash);
    if ($hash === $existing_hash) {
      return true;
    } else {
      return false;
    }
}

?>

