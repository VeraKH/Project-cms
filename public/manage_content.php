<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>
<?php  FindSelectedPage(); ?> 

<section class="all-subj-menu">
  <div>
   <?php echo Navigation($current_subject, $current_page); ?>
   <ul><li><a href="new_subject.php ">+ Add a subject</a></li></ul>
  </div>
  </section>

    <section  class="page">
              <div>
                <?php echo message(); ?>
                    <?php if ($current_subject) { ?>
                    <h2>Manage Content</h2>
                      Menu name:   <?php echo $current_subject["menu_name"]; ?>
                    <a href="edit_subject.php?subject=<?php echo $current_subject["id"]; ?> ">Edit subject</a>
                      <?php } elseif ($current_page) { ?>
                      <h2>Manage Page</h2>
                      Page name:   <?php echo $current_page["menu_name"]; ?>
                         
                                <?php } else { ?>
                        <div class="select-note">Please select a subject or a page</div>
                        <?php } ?>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
