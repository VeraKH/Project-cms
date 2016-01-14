<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php 
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	RedirectTo("admin_login.php");
?>