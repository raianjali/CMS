<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
?>
<?php
if (isset($_POST["Submit"])) {
  $Title=$_POST["title"];
  $Category=$_POST["category"];
  $Post=$_POST["Post"];
  date_default_timezone_set("Asia/Kolkata");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y | %H:%M:%S",$CurrentTime);
  $DateTime;
  $Admin="Anjali Rai";
  $Image=$_FILES["Image"]["name"];
  $Target_directory="Upload/";
  $Target=$Target_directory.basename($_FILES["Image"]["name"]);
  if (empty($Title)) {
    $_SESSION["ErrorMessage"] = "Title cannot be empty";
    Redirect_to("addNewPost.php");
  }
  elseif (empty($Post)) {
    $_SESSION["ErrorMessage"] = "Post cannot be empty";
    Redirect_to("addNewPost.php");
  }
  elseif (strlen($Title)<2) {
    $_SESSION["ErrorMessage"] = "Title is too short.";
    Redirect_to("addNewPost.php");
  }
  else{
    $DeleteFromURL=$_GET['Delete'];
    global $ConnectingDB, $Connection;
    $Query="DELETE FROM admin_panel WHERE id='$DeleteFromURL'";
    $Execute=mysqli_query($Connection,$Query);
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    if($Execute){
      $_SESSION["SuccessMessage"] = "Successfully Deleted Post.";
      Redirect_to("dashboard.php");
    }
    else {
      $_SESSION["ErrorMessage"] = "Failed to Delete Post.";
      Redirect_to("dashboard.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Post</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminstyle.css">
    <link rel="stylesheet" href="css/publicstyles.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2">
          <h1></h1>
          <div id="aa">
            <nav class="navbar navbar-dark">
              <div class="navbar navbar-expand-sm">
              <ul id="Side_Menu" class="nav nav-pills flex-column">
                <li class="nav-item mt-3 aa"><a  href="dashboard.php"><span class="fa fa-home" aria-hidden="true"></span>&nbsp;&nbsp;Dashboard</a></li>
                <li class="mt-3 aa nav-item"><a  class="nav-link active navbar-brand font-weight-bold" href="addNewPost.php" class="nav-link"><span class="fa fa-plus-square" aria-hidden="true"></span>&nbsp;&nbsp;Add New Posts</a></li>
                <li class="mt-3 aa nav-item"><a  href="categories.php" class="nav-link"><span class="fa fa-tag" aria-hidden="true"></span>&nbsp;&nbsp;Categories</a></li>
                <li class="mt-3 aa nav-item"><a  href="#" class="nav-link"><span class="fa fa-user-plus" aria-hidden="true"></span>&nbsp;&nbsp;Manage Admins</a></li>
                <li class="mt-3 aa nav-item"><a  href="#" class="nav-link"><span class="fa fa-comments" aria-hidden="true"></span>&nbsp;&nbsp;Comments</a></li>
                <li class="mt-3 aa nav-item"><a  href="#" class="nav-link"><span class="fa fa-paper-plane" aria-hidden="true"></span>&nbsp;&nbsp;Live Blogs</a></li>
                <li class="mt-3 aa nav-item"><a  href="#" class="nav-link"><span class="fa fa-power-off" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a></li>
              </ul>
            </nav>
          </div>

        </div>
        <!--Ending of side area-->
        <div class="col-sm-10">
          <br>
          <h1>Delete Post</h1>
          <?php echo message();
           echo successMessage();
          ?>
          <div>
            <?php
             $SearchQueryParameter=$_GET['Delete'];
             global $ConnectingDB, $Connection;
             $ViewQuery="SELECT * FROM admin_panel WHERE id='$SearchQueryParameter'";
             $Execute=mysqli_query($Connection,$ViewQuery);
             while($DataRows=mysqli_fetch_assoc($Execute)){
               $TitleToBeUpdated=$DataRows["title"];
               $CategoryToBeUpdated=$DataRows["category"];
               $ImageToBeUpdated=$DataRows["image"];
               $PostToBeUpdated=$DataRows["post"];
            ?>
            <form class="" action="DeletePost.php?Delete=<?php echo $SearchQueryParameter ?>" method="post" enctype="multipart/form-data">
              <fieldset>
                <div class="form-group">
                  <label for="title"><span class="FieldInfo">Title:</span></label>
                  <input class="form-control" value="<?php echo $TitleToBeUpdated; ?>" type="text" name="title" id="title" placeholder="Title">
                </div>
                <div class="form-group">
                  <span class="FieldInfo">Existing Category:</span>
                  <?php echo $CategoryToBeUpdated; ?>
                  <br>
                  <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
                  <select class="form-control" id="categoryselect" name="category">
                    <?php
                    global $ConnectingDB, $Connection;
                    $ViewQuery="SELECT * FROM category ORDER BY dateT desc";
                    $Execute=mysqli_query($Connection,$ViewQuery);
                    while($DataRows=mysqli_fetch_assoc($Execute)){
                      $ID=$DataRows["id"];
                      $CategoryName=$DataRows["name"];
                    ?>
                    <option><?php echo $CategoryName ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <span class="FieldInfo">Existing Image:</span>
                  <img src="Upload/<?php echo $ImageToBeUpdated; ?>" width="160"; height="70px">
                  <br>
                  <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                  <input class="form-control" type="File" name="Image" id="imageselect" placeholder="Select Image">
                </div>
                <div class="form-group">
                  <label for="postarea"><span class="FieldInfo">Post:</span></label>
                  <textarea class="form-control" name="Post" rows="9" cols="100" id="post">
                    <?php echo $PostToBeUpdated; ?>
                  </textarea>
                </div>
                <br>
                <input class="btn btn-danger btn-lg" type="submit" name="Submit" value="Delete Post">
              </fieldset>
              <br>
            </form>
          <?php } ?>
          </div>
          </div>
        <!--Ending of main area-->
      </div><!--Ending of Row-->
    </div><!--Ending of container-fluid-->
    <br>
    <div id="Footer">
      <hr><p style="color:white; text-decoration:none; cursor:pointer; font-weight:bold;">Theme By | Anjali Rai | &copy; 2019-2020 --- All right reserved.</p></hr>
    </div>
    <div style="height: 10px; background: #27AAE1;"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
