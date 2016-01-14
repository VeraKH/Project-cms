<?php 
require_once ("../../includes/initialize.php");
IncludeLayout("admin-header.php");
?>

<?php if (!$session->IsLoggedIn()) { RedirectTo("login.php"); }?>

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
             <h2>Welcome,</h2>
            </div>
            </section>

<?php IncludeLayout("footer.php"); ?>