<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
Confirm_Login();
?>
<?php
if (isset($_POST["Submit"])) {
  $Username=$_POST["username"];
  $Password=$_POST["password"];
  $ConfirmPassword=$_POST["confirmpassword"];
  date_default_timezone_set("Asia/Kolkata");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y | %H:%M:%S",$CurrentTime);
  $DateTime;
  $Admin=$_SESSION["Username"];
  if (empty($Username)||empty($Password)||empty($ConfirmPassword)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled out.";
    Redirect_to("admins.php");
  }
  elseif (strlen($Password)<4) {
    $_SESSION["ErrorMessage"] = "Password is too weak.";
    Redirect_to("admins.php");
  }
  elseif ($Password!==$ConfirmPassword) {
    $_SESSION["ErrorMessage"] = "Password is not matched.";
    Redirect_to("admins.php");
  }
  else{
    global $ConnectingDB, $Connection;
    $Query="INSERT INTO registration(dateT,username,password,addedby) VALUES('$DateTime','$Username','$Password','$Admin')";
    $Execute=mysqli_query($Connection,$Query);
    if($Execute){
      $_SESSION["SuccessMessage"] = "Successfully Added Admin.";
      Redirect_to("admins.php");
    }
    else {
      $_SESSION["ErrorMessage"] = "Failed to Add Admin.";
      Redirect_to("admins.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Admins</title>
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
         <img src="./images/Logonew.png" width="110" height="50" alt="" class="logo">
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
                <li class="mt-3 aa nav-item"><a  href="addNewPost.php" class="nav-link"><span class="fa fa-plus-square" aria-hidden="true"></span>&nbsp;&nbsp;Add New Posts</a></li>
                <li class="mt-3 aa nav-item"><a  href="categories.php" class="nav-link"><span class="fa fa-tag" aria-hidden="true"></span>&nbsp;&nbsp;Categories</a></li>
                <li class="mt-3 aa nav-item"><a  href="admins.php" class="nav-link active font-weight-bold"><span class="fa fa-user-plus" aria-hidden="true"></span>&nbsp;&nbsp;Manage Admins</a></li>
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
          <h1>Manage Admins</h1>
          <?php echo message();
           echo successMessage();
          ?>
          <div>
            <form class="" action="admins.php" method="post">
              <fieldset>
                <div class="form-group">
                  <label for="username"><span class="FieldInfo">Username:</span></label>
                  <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="password"><span class="FieldInfo">Password:</span></label>
                  <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="confirmpassword"><span class="FieldInfo">Confirm Password:</span></label>
                  <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                </div>
                <br>
                <input class="btn btn-success btn-lg" type="Submit" name="Submit" value="Add New Admin">
              </fieldset>
              <br>
            </form>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>Serial Number</th>
                <th>Date and Time</th>
                <th>Admin Name</th>
                <th>Added By</th>
                <th>Action</th>
              </tr>
              <?php
              global $ConnectingDB, $Connection;
              $ViewQuery="SELECT * FROM registration ORDER BY id desc";
              $Execute=mysqli_query($Connection,$ViewQuery);
              $SrNO=0;
              while($DataRows=mysqli_fetch_assoc($Execute)){
                $ID=$DataRows["id"];
                $DateTime=$DataRows["dateT"];
                $Name=$DataRows["username"];
                $Author=$DataRows["addedby"];
                $SrNO++;
              ?>
              <tr>
                <td><?php echo $SrNO ?></td>
                <td><?php echo $DateTime; ?></td>
                <td><?php echo $Name; ?></td>
                <td><?php echo $Author; ?></td>
                <td><a class="btn btn-danger" href="deleteAdmin.php?id=<?php echo $ID; ?>">Delete</a></td>
              </tr>
            <?php } ?>
            </table>
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
