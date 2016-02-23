 <?php 
require_once("database.php");    

class Photograph extends DataBaseObject {

  protected static $table_name="photographs";
  protected static $db_fields=array('id', 'filename', 'type', 'size', 'caption');

  public $id;  
  public $filename;
  public $type; 
  public $size;
  public $caption;

  public $temp_path;
  public $upload_dir = "img";
  public $errors=array();

  protected $upload_errors = array(
    UPLOAD_ERR_OK  => "Successfully uploaded",
    UPLOAD_ERR_INI_SIZE  => "Upload file is too large",
    UPLOAD_ERR_FORM_SIZE  => "Upload file is too large for MAX_FILE_SIZE",
    UPLOAD_ERR_PARTIAL  => "Uploaded partially only",
    UPLOAD_ERR_NO_FILE  => "Upload file ha s not been found",
    UPLOAD_ERR_NO_TMP_DIR  => "Please check if upload directory exists",
    UPLOAD_ERR_CANT_WRITE  => "Sorry, cannot write to disk. Please, check the permissions for this file or directory",
    UPLOAD_ERR_EXTENSION  => "Sorry, extension stopped file uploading"
 ); 

public function AttachFile($file){
     //perform error checking on the form
      // set object attr to the form
      //no saving in the db yet
  
    if (!$file || empty($file) || !is_array($file)) {

      $this->errors[] = "No file was uploaded.";
      return false;
    } elseif ($file["error"] != 0) {
      $this->errors[] = $this->upload_errors[$file["error"]];
      return false;
    } else{
    $this->temp_path       = $file['tmp_name'];
    $this->filename          = basename($file['name']);
    $this->type                  = $file['type'];
    $this->size                  = $file['size'];
    return true;
    }
  }

  public function SaveWithFile(){
    // if (isset($this->id)) {
    //   $this->Update();
    // } else {
    //       if (!empty($this->errors)) { return false; }
    // }
    if (strlen($this->caption) > 255) {
      $this->errors[] = "The caption can only be 255 chars";
      return false;
    }
    if (empty($this->filename) || empty($this->temp_path)) {
      $this->errors[] = "The file location fwas not available.";
      return false;
    }

      $target_path = SITE_ROOT .DS. "public" .DS . $this->upload_dir .DS. $this->filename;

      if (file_exists($target_path)) {
        $this->errors[] = "The file {$this->filename} already exists.";
        return false;
      }
      if (move_uploaded_file($this->temp_path, $target_path)) {
       if ($this->Create()) {
          unset($this->temp_path);
          return true;
        } 
      } else {
        $this->errors[] = "The file upload failed, possibly due to incorrect permission on the upload folder.";
        return false; 
      }
    }

 
  }

?>
