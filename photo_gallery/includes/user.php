 <?php 
require_once(LIB_PATH.DS."database.php");    

class User extends DataBaseObject {

  protected static $table_name="users";
  protected static $field_name="username";
  protected static $db_fields=array('id', 'username', 'password');

  public $id;  
  public $username;
  public $password; 


public static function Authenticate($username="", $password=""){
          global $database;
          $username = $database->EscapeValue($username);
          $password = $database->EscapeValue($password);

          $sql = ("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1");
          $result_array = self::FindBySql($sql);
          return !empty($result_array) ? array_shift($result_array) : false;
}

public function UsernamePassword(){
  if (isset($this->username ) && isset($this->password)) {
    return $this->username . " " . $this->password;
  } else {
    return "what are you looking for??";
  }
}

}
$user = new User();



?>
