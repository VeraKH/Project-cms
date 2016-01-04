<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php  FindSelectedPage();  ?> 

<section class="all-subj-menu">
  <div>
   <?php echo Navigation($current_subject, $current_page, false); ?>
  </div>
  </section>

    <section  class="page">
              <div>
                  <?php echo message(); ?>
                   <?php $errors = Errors(); ?>
                     <?php echo FormErrors($errors)?>
                    

              <h2>Create Subject</h2>
                   <form action="create_subject.php" method="post">
                     <p>Menu Name:
                     <input type="text" name="menu_name" value="" />
                     </p>
                     <p>Position
                     <select name="position">
                     <?php
                     $subject_set = FindAllSubjects(false);
                     $subject_count = mysqli_num_rows($subject_set); 
                     for ($i=1; $i <=$subject_count+1; $i++) { 
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
                   <input type="submit" name="submit" value="Create Subject" />
                   </form>
                   <br/>
                   <a href="manage_content.php">Cancel</a>
              </div>
            </section>

<?php include ("../includes/layouts/footer.php"); ?>
