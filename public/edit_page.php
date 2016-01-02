<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php  FindSelectedPage();  ?> 

<?php
  if (!$current_page) {
    RedirectTo("manage_content.php");
  }
?>

<?php 

          if (isset($_POST['submit'])) {

          $id = $current_page["id"];
          $menu_name = MysqlPrep($_POST["menu_name"]);
          $position = (int) $_POST["position"];
          $visible = (int) $_POST["visible"];
          $content = MysqlPrep($_POST["content"]);

          $fields_required  = array("menu_name", "position", "visible", "content");
          ValidatePresence($fields_required);

          $fields_with_max_lengths = array("menu_name" => 70);
          ValidateMaxLengths($fields_with_max_lengths);

          if (empty($errors)) {

              $query  = "UPDATE pages SET ";
              $query .= "menu_name = '{$menu_name}', ";
              $query .= "position = {$position}, ";
              $query .= "visible = {$visible}, ";
              $query .= "content = '{$content}' ";
              $query .= "WHERE id = {$id} ";
              $query .= "LIMIT 1";
              $result = mysqli_query($db, $query);

            if ($result && mysqli_affected_rows($db) == 1) {
              $_SESSION["message"] = "Page updated.";
              RedirectTo("manage_content.php?page={$id}");
            } else {
              $_SESSION["message"] = "Page update failed.";
            } 
          } 
          } else {      
            //Prob GET request
        } // end:  if (isset($_POST['submit'])) 

?>

<?php include ("../includes/layouts/admin-header.php");?>

<section class="all-subj-menu">
  <div>
   <?php echo Navigation($current_subject, $current_page); ?>
  </div>
  </section>
    <section  class="page">
                  <?php echo message(); ?>
                  <?php echo FormErrors($errors); ?>
              <div>
              <h2>Edit Page: <?php echo htmlentities($current_page["menu_name"]); ?></h2>

                  <form action="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>" method="post">
                     <p>Page Name:
                     <input type="text" name="menu_name" value="<?php echo $current_page["menu_name"]?>" />
                     </p>
                     <p>Position:
                     <select name="position">
                      <?php
                        $page_set = PagesForSubjects($current_page["subject_id"]);
                        $page_count = mysqli_num_rows($page_set);
                        for($count=1; $count <= $page_count; $count++) {
                          echo "<option value=\"{$count}\"";
                          if ($current_page["position"] == $count) {
                            echo " selected";
                          }
                          echo ">{$count}</option>";
                        }
                      ?>
                     </select>
                     </p>

                     <p>Visible
                       <input type="radio" name="visible" value="0" 
                       <?php 
                       if ($current_page["visible"] == 0) {
                          echo "checked";
                        } ?> /> No
                        
                       &nbsp
                       <input type="radio" name="visible" value="1"
                         <?php 
                       if ($current_page["visible"] == 1) {
                          echo "checked";
                        } ?> />Yes
                     </p>
                     <p> <textarea name="content" rows="20" cols="60"><?php echo htmlentities($current_page["content"]); ?></textarea></p>
                   <input type="submit" name="submit" value="Edit Page" />
                   </form>
                   <br/>
                     <a href="manage_content.php?page=<?php echo urlencode($current_page["id"]); ?>">Cancel</a>
                     <a href="delete_page.php?page=<?php echo urlencode($current_page["id"]); ?>">Delete Page</a>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>