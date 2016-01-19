<?php 
require_once ("../../includes/initialize.php");

class Log  {

public $filename = SITE_ROOT.DS."logs/logs.txt";    

function WriteLog($username="", $message=""){
    if($handle = fopen($this->filename, "a")){
      $time = strftime("%d/%m/%Y %H:%M", time());
      $content = "{$time} : {$username} {$message}\n";
      fwrite($handle, $content);
      fclose($handle);
     }
} 

function ReadLog(){
  if(file_exists($this->filename) && is_readable($this->filename)  && 
        $handle = fopen($this->filename, "r")) {
        $content = fread($handle, filesize($this->filename));
        while (!feof($handle)) {
          if (trim($handle != "")) {
              return nl2br($content .= fgets($handle));
          }
        }
        fclose($handle);
   }
  }

  function ClearLog(){
    unlink($this->filename);
}
}

$log_file = new Log; 

?>
