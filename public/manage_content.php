<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php $context = "admin"; ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php  FindSelectedPage(); ?> 

<section class="all-subj-menu">
  <div>
  <ul><li><a href="manage_content.php">&laquo; Main Menu</a></li></ul>
   <?php echo Navigation($current_subject, $current_page, $public=false); ?>
   <ul>
   <li><a href="new_subject.php ">+ Add a subject</a></li></ul>
  </div>
  </section>

    <section  class="page-cont">
              <div>
                <?php echo message(); ?>
                    <?php if ($current_subject) { ?>
                    <h2>Manage Content</h2>
                       Id: <?php echo htmlentities($current_subject["id"]) ; ?><br/>
                      Menu name:   <?php echo htmlentities($current_subject["menu_name"]); ?><br/>
                      Position <?php echo $current_subject["position"]; ?> <br />
                      Visible <?php echo $current_subject["visible"] == 1 ? 'yes' : 'no'; ?> <br />
                    <br/>
                    <a href="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?> ">Edit subject</a><br/>
                       <a href="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?> ">Add a page</a>
                      <?php } elseif ($current_page) { ?>
                      <h2>Manage Page</h2>
                      Page name:   <?php echo htmlentities($current_page["menu_name"]) ; ?><br/>
                      Id:   <?php echo htmlentities($current_page["id"]) ; ?><br/>
                      Position <?php echo $current_page["position"]; ?> <br />
                      Visible <?php echo $current_page["visible"] == 1 ? 'yes' : 'no'; ?> <br />
                      Content: <br/>
                      <div class="page-content">
                        <?php echo htmlentities($current_page["content"]); ?> <br />
                      </div>
                      <p><a href="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?> ">Edit page</a><br/>
                         
                                <?php } else { ?>
                        <div class="select-note">Please select a subject or a page</div>
                        <?php } ?>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
