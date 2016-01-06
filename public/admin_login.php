<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
        $username = "";

          if (isset($_POST['submit'])) {

          $fields_required  = array("username", "password");
          ValidatePresence($fields_required);

          $fields_with_max_lengths = array("username" => 40);
          ValidateMaxLengths($fields_with_max_lengths);

          $fields_with_max_lengths = array("username" => 40);
          ValidateMaxLengths($fields_with_max_lengths);

            if (empty($errors)) {
              //Login

          $username = $_POST["username"];
          $password= $_POST["password"];

            $found_admin = AttemptLogin($username, $password);

            if ($found_admin) {
              $_SESSION['admin_id'] = $found_admin["id"];
              $_SESSION['username'] = $found_admin["username"];
              RedirectTo("admin.php");
            } else {
              $_SESSION["message"] = "Username/Password not found.";
            } 
          }
        } else {
                     
        }
?>

<?php $context = "admin"; ?>
<?php include ("../includes/layouts/admin-header.php");?>
<section class="all-subj-menu"><div></div></section>

    <section  class="page">
              <div>
                  <?php echo message(); ?>
                   <?php $errors = Errors(); ?>
                     <?php echo FormErrors($errors)?>
                    

              <h2>Login</h2>
                   <form action="admin_login.php" method="post">
                     <p>Admin Username:
                     <input type="text" name="username" value="<?php echo htmlentities($username); ?>"/>
                     </p>
                      <p>Password:
                     <input type="password" name="password" value="" />
                     </p>

                   <input type="submit" name="submit" value="Log in" />
                   </form>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
