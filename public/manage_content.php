<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php 
   if (isset($_GET["subject"])) {
   	$selected_subject_id = $_GET["subject"];
   	$selected_page_id = null;
   } elseif (isset($_GET["page"])) {
   	$selected_page_id = $_GET["page"];
   	$selected_subject_id = null;
   } else {
   	$selected_subject_id = null;
   	$selected_page_id = null;
   }
?> 

<section class = "inside" id="inside-course">
            <article>
                <h2>Manage Content</h2>
<?php $result  = FindAllSubjects();?>
<?php 
	while($subject = mysqli_fetch_assoc($result)) {  
?>     
      <ul>
	<li>
	<?php $page_set = PagesForSubjects($subject["id"]); ?>
	     <a href="manage_content.php?subject=<?php echo urlencode($subject["id"])?>" ><?php echo $subject["menu_name"]; ?></a>
	</li>
	     <?php while($page = mysqli_fetch_assoc($page_set )) {  ?>
		<ul>
	     		<li>
	     		       <a href="manage_content.php?page=<?php echo urlencode($page["id"])?>"> <?php echo $page["menu_name"]; ?></a>
	     		</li>
	             </ul>
	     <?php } ?>
	     	<?php mysqli_free_result($page_set); ?>
       </ul>
<?php }  ?>

<?php mysqli_free_result($result); ?>
                
            </article>
        </section>

<?php include ("../includes/layouts/footer.php"); ?>
