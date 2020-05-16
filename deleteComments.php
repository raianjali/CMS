<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
?>
<?php
 if (isset($_GET["id"])) {
   $IdFromURL=$_GET["id"];
   global $ConnectingDB, $Connection;
   $ViewQuery="DELETE FROM comments WHERE id='$IdFromURL'";
   $Execute=mysqli_query($Connection,$ViewQuery);
   if($Execute){
     $_SESSION["SuccessMessage"] = "Comments Deleted Successfully.";
     Redirect_to("comments.php");
   }
   else {
     $_SESSION["ErrorMessage"] = "Failed to Delete Comments.";
     Redirect_to("comments.php");
   }
 }
?>
