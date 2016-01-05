<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

  <?php $admin = FindAdminById($_GET["id"]); ?>

<?php 

  if (!$admin) {
    redirect_to("manage_admins.php");
  }
?>

<?php
  if (isset($_POST['submit'])) {

          $fields_required  = array("username", "password");
          ValidatePresence($fields_required);

          $fields_with_max_lengths = array("username" => 40);
          ValidateMaxLengths($fields_with_max_lengths);

          $fields_with_max_lengths = array("username" => 40);
          ValidateMaxLengths($fields_with_max_lengths);

            if (empty($errors)) {

          $id = $admin["id"];
          $username = MysqlPrep($_POST["username"]);
          $password= MysqlPrep($_POST["password"]);

             $query = "UPDATE admins SET ";
             $query .= "username = '{$username}', ";
             $query .= "password = '{$password}' ";
             $query .= "WHERE id = {$id} ";
             $query .= "LIMIT 1";
             $result = mysqli_query($db, $query);

            if ($result && mysqli_affected_rows($db) == 1) {
              $_SESSION["message"] = "Admin user updated.";
              RedirectTo("manage_admin.php");
            } else {
              $_SESSION["message"] = "Admin user apdate failed";
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
                    

              <h2>Edit Admin User</h2>
                   <form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method="post">
                     <p>Admin Username:
                     <input type="text" name="username" value="<?php echo $admin["username"]?> " />
                     </p>
                      <p>Password:
                     <input type="password" name="password" value="" />
                     </p>

                   <input type="submit" name="submit" value="Edit Admin" />
                   </form>
                   <br/>
                   <a href="manage_admin.php">Cancel</a>
              </div>
            </section>



<?php include ("../includes/layouts/footer.php"); ?>
