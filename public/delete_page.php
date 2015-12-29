<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php 

$current_page= FindPageById($_GET["page"]);
        if (!$current_page) {
          RedirectTo("manage_content.php");
        }

         $id = $current_page["id"];
        $query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_affected_rows($db) == 1) {
                $_SESSION["message"] = "Page deleted.";
              RedirectTo("manage_content.php");
            } else {
              $message = "Page deletion failed";
            }

?>