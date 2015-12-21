<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php 
   if (isset($_GET["subject"])) {
   	$selected_subject_id = $_GET["subject"];
   	$selected_page_id = null;
   } elseif (isset($_GET["page"])) {
   	$selected_page_id = $_GET["page"];
   	$selected_subject_id = null;
   } else {
   	$selected_subject_id = null;
   	$selected_page_id = null;
   }
?> 

<section class="all-subj-menu">
  <div>
   <?php echo Navigation($selected_subject_id, $selected_page_id ); ?>
  </div>
  </section>

    <section  class="page">
              <div>
                <h2>Manage Content</h2>
                <p>Here is the content for each page</p>
                    <?php echo $selected_subject_id; ?><br />
                    <?php echo $selected_page_id; ?>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
