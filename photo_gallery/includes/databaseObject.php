<?php 
require_once(LIB_PATH.DS."database.php");    

class DatabaseObject {

    public static function FindBySql($sql="") {
       global $database;
       $result_set = $database->Query($sql);
       $object_array = array();
       while ($row = $database->FetchArray($result_set)) {
         $object_array[] = static::Instantiate($row);
       }
        return $object_array;
}

public static function FindAll(){
      return static::FindBySql("SELECT * FROM ".static::$table_name ." ORDER BY ".static::$field_name. " ASC");
}

public static function FindById($id=0) {
      global $database;
      $result_array = static::FindBySql("SELECT * FROM ".static::$table_name ." WHERE id = {$id} LIMIT 1");
      return !empty($result_array) ? array_shift($result_array) : false;
}

private static function Instantiate($record) {
      $object = new static;

       foreach ($record as $attribute => $value) {
         if ($object->HasAttribute($attribute)) {
           $object->$attribute = $value;
         } 
       }
      return $object;
}

private function HasAttribute($attribute){
      $object_vars = get_object_vars($this);
      return array_key_exists($attribute, $object_vars);
}

public function create(){

}

public function update(){
  
}

public function delete(){
  
}

}



?>
