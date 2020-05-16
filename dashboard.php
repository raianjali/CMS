<?php
require_once("Include/sessions.php");
require_once("Include/functions.php");
require_once("Include/DB.php");
Confirm_Login();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
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
          <h1 style="color:white;"></h1>
          <div id="aa">
            <nav class="navbar navbar-dark">
              <div class="navbar navbar-expand-sm">
              <ul id="Side_Menu" class="nav nav-pills flex-column">
                <li class="nav-item mt-3 aa"><a class="nav-link active navbar-brand font-weight-bold" href="dashboard.php"><span class="fa fa-home" aria-hidden="true"></span>&nbsp;&nbsp;Dashboard</a></li>
                <li class="mt-3 aa nav-item"><a  href="addNewPost.php" class="nav-link"><span class="fa fa-plus-square" aria-hidden="true"></span>&nbsp;&nbsp;Add New Posts</a></li>
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
                <li class="mt-3 aa nav-item"><a  href="blog.php?Page=1" target="_blank" class="nav-link"><span class="fa fa-paper-plane" aria-hidden="true"></span>&nbsp;&nbsp;Live Blogs</a></li>
                <li class="mt-3 aa nav-item"><a  href="logout.php" class="nav-link"><span class="fa fa-power-off" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a></li>
              </ul>
            </nav>
          </div>

        </div>
        <!--Ending of side area-->
        <div class="col-sm-10"><!--Main area-->
          <br>
          <div><?php echo message();
           echo successMessage();
          ?></div>
          <h1>Admin Dashboard</h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>No</th>
                <th>Post Title</th>
                <th>Date & Time</th>
                <th>Author</th>
                <th>Category</th>
                <th>Banner</th>
                <th>Comments</th>
                <th>Actions</th>
                <th>Details</th>
              </tr>
              <?php
               global $ConnectingDB, $Connection;
               $ViewQuery="SELECT * FROM admin_panel ORDER BY dateT desc";
               $Execute=mysqli_query($Connection,$ViewQuery);
               $SrNO=0;
               while ($DataRows=mysqli_fetch_assoc($Execute)) {
                 $PostID=$DataRows["id"];
                 $DateTime=$DataRows["dateT"];
                 $Title=$DataRows["title"];
                 $Category=$DataRows["category"];
                 $Admin=$DataRows["author"];
                 $Image=$DataRows["image"];
                 $Post=$DataRows["post"];
                 $SrNO++;
              ?>
              <tr>
                <td><?php echo $SrNO; ?></td>
                <td style="color: #5e5eff"><?php
                if (strlen($Title)>20)
                  $Title=substr($Title, 0, 20).'...';
                 echo $Title; ?></td>
                <td><?php
                if (strlen($DateTime)>14)
                  $DateTime=substr($DateTime, 0, 14);
                echo $DateTime; ?></td>
                <td><?php
                if (strlen($Admin)>6)
                  $Admin=substr($Admin, 0, 6).'...';
                echo $Admin; ?></td>
                <td><?php
                if (strlen($Category)>8)
                  $Category=substr($Category, 0, 8).'...';
                 echo $Category; ?></td>
                <td><img src="Upload/<?php echo $Image; ?>" width="170"; height="50px";></td>
                <td>
                  <?php
                   global $ConnectingDB, $Connection;
                   $QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostID' AND status='ON'";
                   $QueryExecute=mysqli_query($Connection,$QueryApproved);
                   $RowsApproved=mysqli_fetch_array($QueryExecute);
                   $TotalApproved=array_shift($RowsApproved);
                   if ($TotalApproved>0) {
                  ?>
                  <span class="badge badge-success float-right"><?php echo $TotalApproved; ?></span>
                  <?php } ?>
                  <?php
                   global $ConnectingDB, $Connection;
                   $QueryUnApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostID' AND status='OFF'";
                   $QueryExecute=mysqli_query($Connection,$QueryUnApproved);
                   $RowsUnApproved=mysqli_fetch_array($QueryExecute);
                   $TotalUnApproved=array_shift($RowsUnApproved);
                   if ($TotalUnApproved>0) {
                  ?>
                  <span class="badge badge-warning float-left"><?php echo $TotalUnApproved; ?></span>
                  <?php } ?>
                </td>
                <td>
                  <a href="EditPost.php?Edit=<?php echo $PostID; ?>">
                    <span class="btn btn-warning">Edit</span>
                  </a>
                  <a href="DeletePost.php?Delete=<?php echo $PostID; ?>">
                    <span class="btn btn-danger">Delete</span>
                  </a>
                </td>
                <td><a href="fullPost.php?id=<?php echo $PostID; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
              </tr>
            <?php } ?>
            </table>
          </div>
        </div>
        <!--Ending of main area-->
      </div><!--Ending of Row-->
  </div><!--Ending of container-fluid-->
    <div id="Footer">
      <hr><p style="color:white; text-decoration:none; cursor:pointer; font-weight:bold;">Theme By | Anjali Rai | &copy; 2019-2020 --- All right reserved.</p></hr>
    </div>
    <div style="height: 10px; background: #27AAE1;"></div>


          
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
