<?php 
      $id = 2;
      $password=1;
      $id=2;
      $username = "hello";


     $query = "UPDATE users SET ";
     $query .= "username= '" .$username. "', ";
     $query .= "password= '" .$password. "' ";
     $query .= "WHERE id=" . $id;
     echo $query;
  

?>
