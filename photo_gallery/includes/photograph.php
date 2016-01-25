 <?php 
require_once(LIB_PATH.DS."database.php");    

class Photograph extends DataBaseObject {

  protected static $table_name="photographs";
  protected static $db_fields=array('id', 'filename', 'type', 'size', 'caption');

  public $id;  
  public $filename;
  public $type; 
  public $size;
  public $caption;

  private $temp_path;
  protected $upload_dir = "img";
  public $errors=array();

  $upload_errors = array(
    UPLOAD_ERR_OK  => "Successfully uploaded",
    UPLOAD_ERR_INI_SIZE  => "Upload file is too large",
    UPLOAD_ERR_FORM_SIZE  => "Upload file is too large for MAX_FILE_SIZE",
    UPLOAD_ERR_PARTIAL  => "Uploaded partially only",
    UPLOAD_ERR_NO_FILE  => "Upload file has not been found",
    UPLOAD_ERR_NO_TMP_DIR  => "Please check if upload directory exists",
    UPLOAD_ERR_CANT_WRITE  => "Sorry, cannot write to disk. Please, check the permissions for this file or directory",
    UPLOAD_ERR_EXTENSION  => "Sorry, extension stopped file uploading"

 );

}

$photograph = new Photograph();



?>
