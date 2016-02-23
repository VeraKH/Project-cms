 <?php 
require_once("../../includes/initialize.php");

if (!$session->IsLoggedIn()) {	RedirectTo("login.php"); }

IncludeLayout("admin-header.php");

$max_file_size = 10485760;

$message = "";
if (isset($_POST["submit"])) {
            $photograph = new Photograph();
	$photograph->caption = $_POST["caption"];
	$photograph->AttachFile($_FILES["upload_file"]);
             $photograph->id = $database->InsertId();
	if ($photograph->SaveWithFile()) {
		$message="Successfully uploaded.";
	} else {
		$message = join("<br/>", $photograph->errors);
	}
}
 ?>

 <div>
    <section>
        <div>
            <h2>Upload photo</h2>
            <?php if (!empty($message)) {
                echo "<p>{$message}<p/>";
            }?>
            <form action="photo_upload.php" enctype="multipart/form-data" method="POST">
                <input type="hidden"  name="MAX_FILE_SIZE" value="2000000" />
                <p>Choose file: <input type="file" name="upload_file" /></p>
                <p>Caption:<input type="text" name="caption" value="" /></p>
                <input type="submit" name="submit" value="Upload" />
            </form>
        </div>
    </section>
</div>

<?php include("../../includes/layouts/footer.php"); ?>