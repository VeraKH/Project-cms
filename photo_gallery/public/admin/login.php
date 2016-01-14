<?php 
include ("../../includes/layouts/admin-header.php");
require_once ("../../includes/initialize.php");

if ($session->IsLoggedIn()) {RedirectTo("index.php"); }

if (isset($_POST["submit"])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $found_user = User::Authenticate($username, $password);

    if ($found_user) {
      $session->LogIn($found_user);
      RedirectTo("index.php");  
    } else {
      echo "wrong";
    } 
} else {
  $username ="";
  $password = "";
}

?>


<section class="all-subj-menu"><div></div></section>

    <section  class="page">
              <div>
              <h2>Login</h2>
                   <form action="login.php" method="post">
                     <p>Admin Username:
                     <input type="text" name="username" value="<?php echo htmlentities($username)?>"/>
                     </p>
                      <p>Password:
                     <input type="password" name="password" value="<?php echo htmlentities($password)?>" />
                     </p>

                   <input type="submit" name="submit" value="Log in" />
                   </form>
              </div>
            </section>

<?php include("../../includes/layouts/footer.php"); ?>
<?php if(isset($database)) { $database->CloseConnection(); } ?>
