<?php 
include ("../../includes/layouts/admin-header.php");
require_once ("../../includes/initialize.php");

 if (!$session->IsLoggedIn()) { 
  RedirectTo("login.php"); } 

?>
<section class="all-subj-menu">
  <div>
   <ul><li><a class="btn" ttitle="Clear log file" href="logs_view.php?clear=true">Clear log file</a><li/></ul>
  </div>
</section>

<section  class="page-cont">
             <div>
             <h2>Logs view</h2>

                <ul>
                    <li>
                       <p><?php echo $log_file->ReadLog();?></p>
                    </li>
                </ul>
            </div>
            </section>

<?php
  if ($_GET['clear']=='true') { 
  $log_file->ClearLog();
  $log_file->WriteLog("User ID {$session->user_id} has cleared the log file");     
  $log_file->ReadLog();
  RedirectTo("index.php"); 
} 
?>

<?php include("../../includes/layouts/footer.php"); ?>
<?php if(isset($database)) { $database->CloseConnection(); } ?>
