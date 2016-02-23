<?php 
require_once(LIB_PATH.DS."db_connect.php");    

class MySQLDatabase {
  private $db;

  function __construct() {
      $this->OpenConnection(); 
  }

  public function OpenConnection(){
        $this->db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

       if (mysqli_connect_errno()) {
        die ("Database connection failed: "  . 
          mysqli_connect_error() . 
          " (" . mysqli_connect_errno() . ") "
          );
        }
   }

  private function ConfirmQuery ($result_set) {
        if (!$result_set) {
         die ("Database query failed");
       }
  }

  public function Query($query){
            $result = mysqli_query($this->db, $query);
            $this->ConfirmQuery($result);
            return $result;
    }

      public function CloseConnection() {
        if (isset($this->db)) {
        mysqli_close($this->db);
        unserialize($this->db);
          }
  }

  public function EscapeValue($string) {
            $escaped_string = mysqli_real_escape_string($this->db, $string);
            return $escaped_string;
  }

  // Database neutral functions
  public function FetchArray($result_set){
        return mysqli_fetch_array($result_set);
  }

  public function FetchAssoc($result_set){
        return mysqli_fetch_assoc($result_set);
  }

  public function NumRows($result_set) {
      return mysqli_num_rows($result_set);
  }

  public function InsertId() {
      return mysqli_insert_id($this->db);
  }

  public function AffectedRows() {
      return mysqli_affected_rows($this->db);

  }   
}

$database = new MySQLDatabase();
// $db = & $database  // and the way to call by reference

?>