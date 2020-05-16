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
    global $ConnectingDB, $Connection;
    $Query="INSERT INTO admin_panel(dateT,title,category,author,image,post) VALUES(?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($Connection);
    if (!mysqli_stmt_prepare($stmt, $Query)) {
      echo "SQL error";
    }
    else{
      mysqli_stmt_bind_param($stmt, "ssssss", $DateTime, $Title, $Category, $Admin, $Image, $Post);
      //mysqli_stmt_execute($stmt);
      if(mysqli_stmt_execute($stmt)){
        $_SESSION["SuccessMessage"] = "Successfully Added Post.";
        move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
        Redirect_to("addNewPost.php");
      }
      else {
        $_SESSION["ErrorMessage"] = "Failed to Add Post.";
        Redirect_to("addNewPost.php");
      }


    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminstyle.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
    .FieldInfo{
      color: #FF8933;
      font-family: Bitter, Georgia, "Times New Roman", Times, serif;
      font-size: 1.2em;
    }
    </style>
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
          <h1>Add New Post</h1>
          <?php echo message();
           echo successMessage();
          ?>
          <div>
            <form class="" action="addNewPost.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <div class="form-group">
                  <label for="title"><span class="FieldInfo">Title:</span></label>
                  <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                </div>
                <div class="form-group">
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
                  <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                  <input class="form-control" type="File" name="Image" id="imageselect" placeholder="Select Image">
                </div>
                <div class="form-group">
                  <label for="postarea"><span class="FieldInfo">Post:</span></label>
                  <textarea class="form-control" name="Post" rows="9" cols="100" id="post"></textarea>
                </div>
                <br>
                <input class="btn btn-success btn-lg" type="Submit" name="Submit" value="Add New Post">
              </fieldset>
              <br>
            </form>
          </div>
          </div>
        <!--Ending of main area-->
      </div><!--Ending of Row-->
    </div><!--Ending of container-fluid-->
    <br>
    <div style="height: 10px; background: #27AAE1;"></div>
    <div id="Footer">
      <hr><p style="color:white; text-decoration:none; cursor:pointer; font-weight:bold;">Theme By | Anjali Rai | &copy; 2019-2020 --- All right reserved.</p></hr>
    </div>
    <div style="height: 10px; background: #27AAE1;"></div>
  </body>
</html>
