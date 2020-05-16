<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
?>
<?php
 if (isset($_GET["id"])) {
   $IdFromURL=$_GET["id"];
   $Admin=$_SESSION["Username"];
   global $ConnectingDB, $Connection;
   $ViewQuery="UPDATE comments SET status='ON', approvedby='$Admin' WHERE id='$IdFromURL'";
   $Execute=mysqli_query($Connection,$ViewQuery);
   if($Execute){
     $_SESSION["SuccessMessage"] = "Comments Approved Successfully.";
     Redirect_to("comments.php");
   }
   else {
     $_SESSION["ErrorMessage"] = "Failed to Approved Comments.";
     Redirect_to("comments.php");
   }
 }
?>
