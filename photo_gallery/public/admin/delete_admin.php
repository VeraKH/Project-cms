<?php 
include ("../../includes/layouts/admin-header.php");
require_once ("../../includes/initialize.php");
    
    $user=User::FindById($_GET["id"]);

    if (!$user) {
    redirect_to("manage_admin.php");
  } else {
    $user->id = $_GET['id'];
    $user->Delete();
    }
?>


<?php include("../../includes/layouts/footer.php"); ?>
