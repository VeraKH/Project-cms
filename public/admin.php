<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php $context = "admin"; ?>
<?php include ("../includes/layouts/admin-header.php");?>

<section class="all-subj-menu">
  <div>
  <ul><li><a href="admin.php">&laquo; News</a></li></ul>
                <ul>
                    <li>
                        <a title = "January" href="#">January</a>
                    </li>
                    <li>
                        <a title = "February" href="#">February</a>
                    </li>
                     <li>
                        <a title = "March" href="#">March</a>
                    </li>
                     <li>
                        <a title = "April" href="#">April</a>
                    </li>
                </ul>
  </div>
</section>

<section  class="page-cont">
             <div>
            </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>





