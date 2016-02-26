<?php 

class Session {
    private $logged_in = false;
    public $user_id;
    public $message;

function __construct() {
      session_start();
      $this->CheckMessage();
      $this->CheckLogin();
        if($this->logged_in) {
    } else {
    }
}

function IsLoggedIn() {
      return $this->logged_in;

 }

function LogIn($user){
  if ($user) {
    $this->user_id = $_SESSION["user_id"] = $user->id;
    $this->logged_in = true;
  }
 }

function LogOut(){
    unset($_SESSION["user_id"]);
    unset($this->user_id);
    $this->logged_in = false;
 }

function CheckLogin(){
        if (isset($_SESSION["user_id"])) {
          $this->user_id = $_SESSION["user_id"];
          $this->logged_in = true;
        } else {
            unset($this->user_id);
            $this->user_id = false;
        }
 }

 function Message(){
              if (isset($_SESSION["message"])) {
                  $output = "<div class = \"message\">";
                  $output .= htmlentities($_SESSION["message"]);
                  $output .= "</div>";

                  $_SESSION["message"] = null;
                  return $output;
              }
}    

 public function SetMessage($msg=""){
        if (!empty($msg)) {
         $_SESSION["message"] = $msg; 
        } else {
          return $this->message;
        }
}    


public function CheckMessage() {
         if (isset($_SESSION["message"])) {
          $this->message = htmlentities($_SESSION["message"]);
          unset($_SESSION["message"]);
          } else {
            $this->message = "";
          }
}

}
  
$session  = new Session();
$message = $session->SetMessage();

?>