<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
?>
<?php
 if (isset($_GET["id"])) {
   $IdFromURL=$_GET["id"];
   global $ConnectingDB, $Connection;
   $ViewQuery="DELETE FROM category WHERE id='$IdFromURL'";
   $Execute=mysqli_query($Connection,$ViewQuery);
   if($Execute){
     $_SESSION["SuccessMessage"] = "Categories Deleted Successfully.";
     Redirect_to("categories.php");
   }
   else {
     $_SESSION["ErrorMessage"] = "Failed to Delete Categories.";
     Redirect_to("categories.php");
   }
 }
?>
