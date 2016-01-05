<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 

          if (isset($_POST['submit'])) {

          $fields_required  = array("username", "password");
          ValidatePresence($fields_required);

          $fields_with_max_lengths = array("username" => 40);
          ValidateMaxLengths($fields_with_max_lengths);

          $fields_with_max_lengths = array("username" => 40);
          ValidateMaxLengths($fields_with_max_lengths);

            if (empty($errors)) {

          $username = MysqlPrep($_POST["username"]);
          $hashed_password= PasswordEncrypt($_POST["password"]);

             $query = "INSERT INTO admins (";
             $query .= "username, hashed_password";
             $query .= ")  VALUES (";
             $query .=  "  '{$username}', '{$hashed_password}' ";
             $query .= ")";
             $result = mysqli_query($db, $query);

            if ($result) {
              $_SESSION["message"] = "Admin user created.";
              RedirectTo("manage_admin.php");
            } else {
              $_SESSION["message"] = "Admin user creation failed";
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
                    

              <h2>Add Admin User</h2>
                   <form action="new_admin.php" method="post">
                     <p>Admin Username:
                     <input type="text" name="username" value="" />
                     </p>
                      <p>Password:
                     <input type="password" name="password" value="" />
                     </p>

                   <input type="submit" name="submit" value="Create Admin" />
                   </form>
                   <br/>
                   <a href="manage_admin.php">Cancel</a>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
