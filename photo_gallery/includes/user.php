<?php 
require_once(LIB_PATH.DS."database.php");    

class User extends DataBaseObject {

  protected static $table_name="users";
  protected static $field_name="username";

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

public function Create($username, $password){
global $database;

     $query = "UPDATE users SET (";
     $query .= "username, password";
     $query .= ")  VALUES (' ";
     $query .= $database->EscapeValue($this->$username). " ', ' ";
     $query .= $database->EscapeValue($this->$password). " ') ";
     $query .= "WHERE id = {$id} ";
     $query .= "LIMIT 1";

            $result = $database->Query($query);
             if ($result) {
               $this->id = $database->InsertId();
                RedirectTo("index.php");
            } else {
                RedirectTo("new_user.php");
            } 
}


public function Update(){
     global $database;

     $query = "UPDATE users SET ";
     $query .= "username= '" .$database->EscapeValue($this->username). "', ";
     $query .= "password= '" .$database->EscapeValue($this->password). "' ";
     $query .= "WHERE id=" . $database->EscapeValue($this->id);
     $database->Query($query);
      return($database->AffectedRows()==1) ?  RedirectTo("manage_admin.php") : RedirectTo("edit_admin.php?id=".$this->id);
}

public function Delete(){
      global $database;
      $query = "DELETE FROM users ";
      $query .= "WHERE id=" . $database->EscapeValue($this->id);
      $query .= " LIMIT 1";
      $database->Query($query);
      return($database->AffectedRows()==1) ?  RedirectTo("manage_admin.php") : RedirectTo("edit_admin.php?id=".$this->id);
}

}


$user = new User();



?>
