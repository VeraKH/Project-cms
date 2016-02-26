<?php 
require_once ("../../includes/initialize.php");
if ($_SERVER['SCRIPT_FILENAME'] == SITE_ROOT.DS."public".DS."admin".DS."logs_view.php"){
	
   echo  "<div><ul><li><a class=\"btn\" ttitle=\"Clear log file\" href=\"logs_view.php?clear=true\">Clear log file</a><li/></ul></div>";
}

?>
