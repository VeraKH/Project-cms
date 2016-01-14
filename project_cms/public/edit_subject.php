<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php  FindSelectedPage();  ?> 

<?php 
        if (!$current_subject) {
          RedirectTo("manage_content.php");
        }
?>

<?php include ("../includes/layouts/admin-header.php");?>


<?php 

          if (isset($_POST['submit'])) {

          $fields_required  = array("menu_name", "position", "visible");
          ValidatePresence($fields_required);

          $fields_with_max_lengths = array("menu_name" => 70);
          ValidateMaxLengths($fields_with_max_lengths);

          if (empty($errors)) {
            // Update
          }

          $id = $current_subject["id"];
          $menu_name = MysqlPrep($_POST["menu_name"]);
          $position = (int) $_POST["position"];
          $visible = (int) $_POST["visible"];

             $query = "UPDATE subjects SET ";
             $query .= "menu_name = '{$menu_name}' , ";
             $query .= "position = {$position} , ";
             $query .= "visible = {$visible}  ";
             $query .= "WHERE id = {$id} ";
             $query .= "LIMIT 1";
             $result = mysqli_query($db, $query);

            if ($result && mysqli_affected_rows($db) >= 0) {
              $_SESSION["message"] = "Subject updated.";
              RedirectTo("manage_content.php");
            } else {
              $message = "Subject update failed";
            } 
        } else {      
            //Prob GET request
        } // end:  if (isset($_POST['submit'])) 

?>

<section class="all-subj-menu">
  <div>
   <?php echo Navigation($current_subject, $current_page, false); ?>
  </div>
  </section>

    <section  class="page">
              <div>
                  <?php 
                          if (!empty($message)) {
                            echo "<div class =\"message\">" . htmlentities($message) . "</div";
                            } 
                    ?>
                     <?php echo FormErrors($errors)?>
                    

              <h2>Edit Subject: <?php echo htmlentities($current_subject["menu_name"]);?></h2>
                   <form action="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]);?>" method="post">
                     <p>Menu Name:
                     <input type="text" name="menu_name" value="<?php echo htmlentities($current_subject["menu_name"]);?>" />
                     </p>
                     <p>Position
                     <select name="position">
                     <?php
                     $subject_set = FindAllSubjects(false);
                     $subject_count = mysqli_num_rows($subject_set); 
                     for ($i=1; $i <=$subject_count; $i++) { 
                       echo "<option value=\"{$i}\" ";
                       if ($current_subject["position"] == $i) {
                         echo " selected";
                       }
                       echo ">{$i}</option>";
                     }
                     ?>
                     </select>

                     </p>
                     <p>Visible
                     <input type="radio" name="visible" value = "0" 
                     <?php 
                       if ($current_subject["visible"] == 0) {
                          echo "checked";
                        }
                        ?>
                        /> No
                       &nbsp
                       <input type="radio" name="visible" value="1"
                        <?php 
                       if ($current_subject["visible"] == 1) {
                          echo "checked";
                        }
                        ?>
                       />Yes
                     </p>
                   <input type="submit" name="submit" value="Edit Subject" />
                   </form>
                   <br/>
                   <a href="manage_content.php">Cancel</a>
                   &nbsp; 
                   &nbsp;
                    <a href="delete_subject.php?subject=<?php echo urlencode($current_subject["id"])?>">Delete subject</a>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
