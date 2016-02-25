<?php 
require_once ("../../includes/initialize.php");
IncludeLayout("admin-header.php");
?>

<?php if (!$session->IsLoggedIn()) { 
  RedirectTo("login.php"); } 
  ?>

<section class="all-subj-menu">
  <div>
  <ul><li><a href="manage_admin.php">Manage admins</a></li></ul>
  <ul><li><a href="logs_view.php">Logs view</a></li></ul>
   <ul><li><a href="photo_upload.php">Upload photo</a></li></ul>
    <ul><li><a href="photo_view.php">View photo</a></li></ul>
  <ul><li><a href="index.php?logout=true">Log out</a></li></ul>
  </div>
</section>

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