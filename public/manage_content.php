<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php 
FindSelectedPage();
?> 

<section class="all-subj-menu">
  <div>
   <?php echo Navigation($current_subject, $current_page); ?>
  </div>
  </section>

    <section  class="page">
              <div>
                    <?php if ($current_subject) { ?>
                    <h2>Manage Content</h2>
                      Menu name:   <?php echo $current_subject["menu_name"]; ?>
                    
                      <?php } elseif ($current_page) { ?>
                      <h2>Manage Page</h2>
                      Page name:   <?php echo $current_page["menu_name"]; ?>
                         
                                <?php } else { ?>
                        Please select a subject or a page
                        <?php } ?>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
