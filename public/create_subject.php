<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 

          if (isset($_POST['submit'])) {

          $menu_name = MysqlPrep($_POST["menu_name"]);
          $position = (int) $_POST["position"];
          $visible = (int) $_POST["visible"];

          $fields_required  = array("menu_name", "position", "visible");
          ValidatePresence($fields_required);

          $fields_with_max_lengths = array("menu_name" => 70);
          ValidateMaxLengths($fields_with_max_lengths);

          if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            RedirectTo("new_subject.php");
          }

             $query = "INSERT INTO subjects (";
             $query .= "menu_name, position, visible";
             $query .= ")  VALUES (";
             $query .=  "  '{$menu_name}', {$position}, {$visible}";
             $query .= ")";
             $result = mysqli_query($db, $query);

            if ($result) {
              $_SESSION["message"] = "Subject created.";
              RedirectTo("manage_content.php");
            } else {
              $_SESSION["message"] = "Subject creation failed";
              RedirectTo("new_subject.php");
            } 
        } else {
            RedirectTo("new_subject.php");          
        }

?>

<?php 
        if (isset($db)) { mysqli_close($db); }
?>