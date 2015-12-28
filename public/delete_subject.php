<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>
<?php include ("../includes/layouts/admin-header.php");?>

<?php 
    $current_subject = FindSubjectById($_GET["subject"]);
        if (!$current_subject) {
          RedirectTo("manage_content.php");
        }

        $pages_set = PagesForSubjects($current_subject["id"]);
        if (mysqli_num_rows($pages_set) > 0) {
              $_SESSION["message"] = "Can't delete subject with pages";
              RedirectTo("manage_content.php?subject={$current_subject["id"]}");
        }

        $id = $current_subject["id"];
        $query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
        $result = mysqli_query($db, $query);

            if ($result && mysqli_affected_rows($db) == 1) {
                $_SESSION["message"] = "Subject deleted.";
              RedirectTo("manage_content.php");
            } else {
              $message = "Subject deletion failed";
              RedirectTo("new_subject.php?subject={$id}");
            }
 ?> 




<?php include ("../includes/layouts/footer.php"); ?>
