<?php 

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT",  DS."users".DS."tsukomoto".DS."sites".DS."photo_gallery");
defined("LIB_PATH") ? null : define("LIB_PATH", SITE_ROOT.DS."includes".DS);


require_once (LIB_PATH.DS."db_connect.php");
require_once (LIB_PATH.DS."functions.php");
require_once (LIB_PATH.DS."session.php");
require_once (LIB_PATH.DS."database.php");
require_once (LIB_PATH.DS."databaseObject.php");
require_once (LIB_PATH.DS."user.php");
require_once (LIB_PATH.DS."log.php");
?>



