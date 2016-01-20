<?php 
require_once ("../../includes/initialize.php");
IncludeLayout("admin-header.php");

if (!$session->IsLoggedIn()) { 
  RedirectTo("login.php"); } 
?>


<section class="all-subj-menu">
  <div>

  </div>
  </section>

    <section  class="page-cont">
             <div>
                <?php echo $session->Message(); ?>
                <h2>Manage Admins</h2>
                <a href="new_user.php"> + Create Admin User</a>
                <table>
               <tr>   
           <th>Admin Username</th>
           <th>Password</th>
               <th>Edit option</th>
          </tr>
      <?php 
      $users = User::FindAll();
       foreach ($users as $user ) { ?>
         <tr>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->password; ?></td>
            <td><a href="edit_admin.php?id=<?php echo $user->id;?>">Edit</a></td>

          </tr>
        <?php } ?>
       </table>
                     
            </div>
            </section>

<?php IncludeLayout("footer.php"); ?> 

