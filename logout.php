<?php
require_once("Include/sessions.php");
require_once("Include/functions.php");
?>
<?php
 $_SESSION["User ID"]=null;
 session_destroy();
 Redirect_to("login.php");
?>
