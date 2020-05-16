<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
function Redirect_to($New_location){
  header("Location:".$New_location);
  exit;
}
function Login_Attempt($Username,$Password){
  global $ConnectingDB, $Connection;
  $Query="SELECT * FROM registration WHERE username='$Username' AND password='$Password'";
  $Execute=mysqli_query($Connection,$Query);
  if ($admin=mysqli_fetch_assoc($Execute)) {
    return $admin;
  }
  else {
    return null;
  }
}
function Login(){
  if (isset($_SESSION["User ID"])) {
    return true;
  }
}
function Confirm_Login(){
  if (!Login()) {
    $_SESSION["ErrorMessage"]="Login Required";
    Redirect_to("login.php");
  }
}
?>
