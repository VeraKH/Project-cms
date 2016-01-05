<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php $admin_set =  FindAllAdmins(); ?>

<?php $context = "admin"; ?>
<?php include ("../includes/layouts/admin-header.php");?>
<section class="all-subj-menu">
  <div>
  </div>
  </section>

    <section  class="page-cont">
             <div>
                <?php echo message(); ?>
                <h2>Manage Admins</h2>
                <a href="new_admin.php"> + Create Admin User</a>
                <table>
	             <tr>   
		       <th>Admin Username</th>
		       <th>Hashed password</th>
	    	       <th>Edit option</th>
	    	       <th>Delete option</th>
	   	</tr>
	   	<?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
		      <tr>
		        <td><?php echo htmlentities($admin["username"]); ?></td>
		        <td><?php echo htmlentities($admin["hashed_password"]); ?></td>
		        <td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a></td>
		        <td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
		      </tr>
    		<?php } ?>
	     </table>
                     
            </div>
            </section>

<?php $context = "admin"; ?>
<?php include ("../includes/layouts/footer.php"); ?>





