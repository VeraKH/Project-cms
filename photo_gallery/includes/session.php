<?php 


class Session {
    private $logged_in = false;
    public $user_id;

function __construct() {
      session_start();
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
    $this->logged_in = афдыу;
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

}
  
$session  = new Session();

?>