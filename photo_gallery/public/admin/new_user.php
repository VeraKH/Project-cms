<?php 
include ("../../includes/layouts/admin-header.php");
require_once ("../../includes/initialize.php");


if (isset($_POST["submit"])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $user->Create($username, $password);
}

?>


<section class="all-subj-menu"><div></div></section>

    <section  class="page">
              <div>
              <h2>Create</h2>
              <?php echo $session->Message(); ?>
                   <form action="new_user.php" method="post">
                     <p>Username:
                     <input type="text" name="username" value=""/>
                     </p>
                      <p>Password:
                     <input type="password" name="password" value="" />
                     </p>

                   <input type="submit" name="submit" value="Create" />
                   </form>
              </div>
    </section>

<?php include("../../includes/layouts/footer.php"); ?>
<?php if(isset($database)) { $database->CloseConnection(); } ?>
