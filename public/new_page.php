<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php  FindSelectedPage();  ?> 

<?php
  if (!$current_subject) {
    RedirectTo("manage_content.php");
  }
?>

<?php 

          if (isset($_POST['submit'])) {

          $fields_required  = array("menu_name", "position", "visible", "content");
          ValidatePresence($fields_required);

          $fields_with_max_lengths = array("menu_name" => 30);
          ValidateMaxLengths($fields_with_max_lengths);

            if (empty($errors)) {

          $subject_id = $current_subject["id"]; 
          $menu_name = MysqlPrep($_POST["menu_name"]);
          $position = (int) $_POST["position"];
          $visible = (int) $_POST["visible"];
          $content = MysqlPrep($_POST["content"]);


             $query = "INSERT INTO pages (";
             $query .= "subject_id, menu_name, position, visible, content";
             $query .= ")  VALUES (";
             $query .=  "  {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}' ";
             $query .= ")";
             $result = mysqli_query($db, $query);

            if ($result) {
              $_SESSION["message"] = "Page created.";
              RedirectTo("manage_content.php?subject=" . urlencode($current_subject["id"]));
            } else {
              $_SESSION["message"] = "Page creation failed";
            } 
          }
        } else {
                     
        }

?>

<section class="all-subj-menu">
  <div>
   <?php echo Navigation($current_subject, $current_page); ?>
  </div>
  </section>
    <section  class="page">
                  <?php echo message(); ?>
                  <?php echo FormErrors($errors); ?>
              <div>
              <h2>Create Page</h2>
                  <form action="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method="post">
                     <p>Page Name:
                     <input type="text" name="menu_name" value="" />
                     </p>
                     <p>Position:
                     <select name="position">
                      <?php
                     $page_position = PagesForSubjects($current_subject["id"]);
                     $pages_count = mysqli_num_rows($page_position); 
                     for ($i=1; $i <=$pages_count+1;  $i++) { 
                       echo "<option value=\"{$i}\">{$i}</option>";
                     }
                     ?>
                     </select>
                     </p>

                     <p>Visible
                       <input type="radio" name="visible" value="0" /> No
                       &nbsp
                       <input type="radio" name="visible" value="1"/>Yes
                     </p>
                     <p><textarea rows="10" cols="50" name="content"></textarea></p>
                   <input type="submit" name="submit" value="Create Page" />
                   </form>
                   <br/>
                     <a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Cancel</a>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
