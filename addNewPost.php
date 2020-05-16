<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
Confirm_Login();
?>
<?php
if (isset($_POST["Submit"])) {
  $Title=$_POST["title"];
  $Category=$_POST["category"];
  $Post=json_encode($_POST["Post"]);
  date_default_timezone_set("Asia/Kolkata");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y | %H:%M:%S",$CurrentTime);
  $DateTime;
  $Admin=$_SESSION["Username"];
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
    $Query="INSERT INTO admin_panel(dateT,title,category,author,image,post) VALUES('$DateTime','$Title','$Category','$Admin','$Image',$Post)";
    $Execute=mysqli_query($Connection,$Query);
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    if($Execute){
      $_SESSION["SuccessMessage"] = "Successfully Added Post.";
      Redirect_to("addNewPost.php");
    }
    else {
      $_SESSION["ErrorMessage"] = "Failed to Add Post.";
      Redirect_to("addNewPost.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Post</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminstyle.css">
    <link rel="stylesheet" href="css/publicstyles.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
         <img src="images/Logonew.png" width="110" height="50" alt="" class="logo">
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div  id="navbarNav" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="blog.php?Page=1">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link active" href="dashboard.php">Admin</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <form class="form-inline my-2 my-lg-0 ml-auto" action="blog.php?Page=1">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
            <button class="btn btn-outline-none my-2 my-sm-0" type="submit" name="SearchButton"><i class="fa fa-search icon"></i></button>
          </form>
        </ul>
      </div>
    </div>
  </nav>
    <div style="height:10px; background:#27aae1;"></div>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2">
          <h1></h1>
          <div id="aa">
            <nav class="navbar navbar-dark">
              <div class="navbar navbar-expand-sm">
              <ul id="Side_Menu" class="nav nav-pills flex-column">
                <li class="nav-item mt-3 aa"><a class="nav-link" href="dashboard.php"><span class="fa fa-home" aria-hidden="true"></span>&nbsp;&nbsp;Dashboard</a></li>
                <li class="mt-3 aa nav-item"><a  href="addNewPost.php" class="nav-link  active font-weight-bold"><span class="fa fa-plus-square" aria-hidden="true"></span>&nbsp;&nbsp;Add New Posts</a></li>
                <li class="mt-3 aa nav-item"><a  href="categories.php" class="nav-link"><span class="fa fa-tag" aria-hidden="true"></span>&nbsp;&nbsp;Categories</a></li>
                <li class="mt-3 aa nav-item"><a  href="admins.php" class="nav-link"><span class="fa fa-user-plus" aria-hidden="true"></span>&nbsp;&nbsp;Manage Admins</a></li>
                <li class="mt-3 aa nav-item"><a  href="comments.php" class="nav-link"><span class="fa fa-comments" aria-hidden="true"></span>&nbsp;&nbsp;Comments
                <?php
                 global $ConnectingDB, $Connection;
                 $QueryTotal="SELECT COUNT(*) FROM comments WHERE status='OFF'";
                 $ExecuteTotal=mysqli_query($Connection,$QueryTotal);
                 $RowsTotal=mysqli_fetch_array($ExecuteTotal);
                 $Total=array_shift($RowsTotal);
                 if ($Total>0) {
                ?>
                <span class="badge badge-warning float-right"><?php echo $Total; ?></span>
                <?php } ?>
              </a></li>
                <li class="mt-3 aa nav-item"><a  href="blog.php?Page=1" class="nav-link"><span class="fa fa-paper-plane" aria-hidden="true"></span>&nbsp;&nbsp;Live Blogs</a></li>
                <li class="mt-3 aa nav-item"><a  href="logout.php" class="nav-link"><span class="fa fa-power-off" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a></li>
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
    
    <div id="Footer">
      <hr><p style="color:white; text-decoration:none; cursor:pointer; font-weight:bold;">Theme By | Anjali Rai | &copy; 2019-2020 --- All right reserved.</p></hr>
    </div>
    <div style="height: 10px; background: #27AAE1;"></div>


          
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
