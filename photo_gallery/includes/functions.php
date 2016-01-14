<?php

function RemoveZero($date_to_format) {
  $without_zero = str_replace("*0", "", $date_to_format);
  $cleaned_string = str_replace("*", "", $without_zero);
  return $cleaned_string;
}


function RedirectTo($new_location){
  header("Location: " .  $new_location);
  exit;
}

function Messages(){
              if (!empty($message="")) {
                  return "<p class=\"message\">{$message}</p>";
              } else {
                return "";
              }
}

function __autoload($class_name){
    $class_name = strtolower($class_name);
    $require_url = LIB_PATH.DS."{$class_name}.php";
    if (file_exists($require_url)) {
      require_once($require_url);
    } else {
        die("The file {$require_url} has not been found");
    }
}

function IncludeLayout($tamplate=""){
  include(SITE_ROOT.DS."layouts".DS.$tamplate);
}



?>

