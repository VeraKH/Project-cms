<?php 
require_once ("../../includes/initialize.php");
IncludeLayout("admin-header.php");
?>

<?php if (!$session->IsLoggedIn()) { 
  RedirectTo("login.php"); } 
  ?>

<?php IncludeLayout("left-menu.php");?>

<section  class="page-cont">
             <div>
             <h2>Welcome, <?php echo $session->user_id; ?></h2>
              <?php echo $session->Message(); ?>
            </div>
            </section>

<?php 
  if ($_GET['logout']=='true') { 
  $session->Logout();
  RedirectTo("login.php"); 
} 
?>

<?php IncludeLayout("footer.php"); ?>