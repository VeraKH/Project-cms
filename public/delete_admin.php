<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php 
    $current_admin = FindAdminById($_GET["id"]);
        if (!$current_admin) {
          RedirectTo("manage_admin.php");
        }

        $id = $current_admin["id"];
        $query = "DELETE FROM admins WHERE id = {$id} LIMIT 1";
        $result = mysqli_query($db, $query);

            if ($result && mysqli_affected_rows($db) == 1) {
                $_SESSION["message"] = "Admin deleted.";
              RedirectTo("manage_admin.php");
            } else {
              $message = "Admin deletion failed";
              RedirectTo("new_admin.php?id={$id}");
            }
 ?> 




<?php include ("../includes/layouts/footer.php"); ?>
