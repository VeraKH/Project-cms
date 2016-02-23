<?php 
include ("../../includes/layouts/admin-header.php");
require_once ("../../includes/initialize.php");
    
    $user=User::FindById($_GET["id"]);

    if (!$user) {
    redirect_to("manage_admin.php");
  }

    if (isset($_POST["submit"])) {
    $user->id = $_GET['id'];
    $user->username = trim($_POST['username']);
    $user->password =trim($_POST['password']);
    if($user->Update()){
         $user->RedirectTo("manage_admin.php");
     } else {
         $user->RedirectTo("edit_admin.php?id=".$user->id);
      }

      } 

?>


<section class="all-subj-menu"><div></div></section>

    <section  class="page">
              <div>
              <h2>Edit profile </h2>
                   <form action="edit_admin.php?id=<?php echo $user->id?>" method="post">
                     <p>Username:
                     <input type="text" name="username" value="<?php echo $user->username?>"/>
                     </p>
                      <p>Password:
                     <input type="password" name="password" value="<?php echo $user->password?>" />
                     </p>
                   <input type="submit" name="submit" value="Edit" />
                    <span><a href="delete_admin.php?id=<?php echo $user->id;?>" onclick="return confirm('Are you sure?');">Delete</a></span>

                   </form>
              </div>
    </section>


<?php include("../../includes/layouts/footer.php"); ?>
