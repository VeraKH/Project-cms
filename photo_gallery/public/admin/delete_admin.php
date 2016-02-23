<?php 
include ("../../includes/layouts/admin-header.php");
require_once ("../../includes/initialize.php");
    
    $user=User::FindById($_GET["id"]);

    if (!$user) {
    redirect_to("manage_admin.php");
  } else {
    $user->id = $_GET['id'];
    if ($user->Delete()) {
    RedirectTo("manage_admin.php");
    } else {
    RedirectTo("edit_admin.php?id=".$user->id);		
    }
    }
?>


<?php include("../../includes/layouts/footer.php"); ?>
