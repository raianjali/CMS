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
    <title>Comments</title>
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
    
        <!--button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#collapse">
          &#9776;
        </button-->
        
    <div style="height:10px; background:#27aae1;"></div>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2">
          <h1 style="color:white;"></h1>
          <div id="aa">
            <nav class="navbar navbar-dark">
              <div class="navbar navbar-expand-sm">
              <ul id="Side_Menu" class="nav nav-pills flex-column">
                <li class="nav-item mt-3 aa"><a class="nav-link" href="dashboard.php"><span class="fa fa-home" aria-hidden="true"></span>&nbsp;&nbsp;Dashboard</a></li>
                <li class="mt-3 aa nav-item"><a  href="addNewPost.php" class="nav-link"><span class="fa fa-plus-square" aria-hidden="true"></span>&nbsp;&nbsp;Add New Posts</a></li>
                <li class="mt-3 aa nav-item"><a  href="categories.php" class="nav-link"><span class="fa fa-tag" aria-hidden="true"></span>&nbsp;&nbsp;Categories</a></li>
                <li class="mt-3 aa nav-item"><a  href="admins.php" class="nav-link"><span class="fa fa-user-plus" aria-hidden="true"></span>&nbsp;&nbsp;Manage Admins</a></li>
                <li class="mt-3 aa nav-item"><a  href="comments.php" class="nav-link active navbar-brand font-weight-bold"><span class="fa fa-comments" aria-hidden="true"></span>&nbsp;&nbsp;Comments
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
        <div class="col-sm-10"><!--Main area-->
          <br>
          <div><?php echo message();
           echo successMessage();
          ?></div>
          <h1>Un-Approved Comments</h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Approve</th>
                <th>Delete Comment</th>
                <th>Details</th>
              </tr>
              <?php
              global $ConnectingDB, $Connection;
              $ViewQuery="SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
              $Execute=mysqli_query($Connection,$ViewQuery);
              $SrNO=0;
              while($DataRows=mysqli_fetch_assoc($Execute)){
                $ID=$DataRows["id"];
                $DateTime=$DataRows["dateT"];
                $Name=$DataRows["name"];
                $Comment=$DataRows["comment"];
                $CommentedPostID=$DataRows["admin_panel_id"];
                $SrNO++;
                //if (strlen($Comment)>10)
                  //{$Comment=substr($Comment, 0, 10).'...';}
                if (strlen($Name)>18)
                  {$Name=substr($Name, 0, 18).'...';}
              ?>
              <tr>
                <td><?php echo htmlentities($SrNO); ?></td>
                <td style="color:#5e5eff;"><?php echo htmlentities($Name); ?></td>
                <td><?php echo htmlentities($DateTime); ?></td>
                <td><?php echo htmlentities($Comment); ?></td>
                <td><a href="approveComments.php?id=<?php echo $ID; ?>"><span class="btn btn-success">Approve</span></a></td>
                <td><a href="deleteComments.php?id=<?php echo $ID; ?>"><span class="btn btn-danger">Delete</span></a></td>
                <td><a href="fullPost.php?id=<?php echo $CommentedPostID; ?>"  target="_blank"><span class="btn btn-primary">Live-Preview</span></a></td>
              </tr>
            <?php } ?>
            </table>
          </div>
          <h1>Approved Comments</h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Approved By</th>
                <th>Approved By</th>
                <th>Revert Approve</th>
                <th>Delete Comment</th>
                <th>Details</th>
              </tr>
              <?php
              global $ConnectingDB, $Connection;
              $Admin="Anjali Rai";
              $ViewQuery="SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
              $Execute=mysqli_query($Connection,$ViewQuery);
              $SrNO=0;
              while($DataRows=mysqli_fetch_assoc($Execute)){
                $ID=$DataRows["id"];
                $DateTime=$DataRows["dateT"];
                $Name=$DataRows["name"];
                $Comment=$DataRows["comment"];
                $ApprovedBy=$DataRows["approvedby"];
                $CommentedPostID=$DataRows["admin_panel_id"];
                $SrNO++;
                //if (strlen($Comment)>10)
                  //{$Comment=substr($Comment, 0, 10).'...';}
                if (strlen($Name)>18)
                  {$Name=substr($Name, 0, 18).'...';}
              ?>
              <tr>
                <td><?php echo htmlentities($SrNO); ?></td>
                <td style="color:#5e5eff;"><?php echo htmlentities($Name); ?></td>
                <td><?php echo htmlentities($DateTime); ?></td>
                <td><?php echo htmlentities($Comment); ?></td>
                <td><?php echo htmlentities($ApprovedBy); ?></td>
                <td><?php echo htmlentities($Admin); ?></td>
                <td><a href="disapproveComments.php?id=<?php echo $ID;?>"><span class="btn btn-warning">Dis-Approve</span></a></td>
                <td><a href="deleteComments.php?id=<?php echo $ID; ?>"><span class="btn btn-danger">Delete</span></a></td>
                <td><a href="fullPost.php?id=<?php echo $CommentedPostID; ?>" target="_blank"><span class="btn btn-primary">Live-Preview</span></a></td>
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
