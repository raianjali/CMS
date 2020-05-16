<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog Page</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
  <link rel="stylesheet" href="css/publicstyles.css">
    <style>
      .imageicon{
        max-width: 150px;
        margin: 0 auto;
        display: block;
      }
      #heading{
        font-family: Bitter, Georgia, "Times New Roman", Times, serif;
        margin-top: -2px;
        font-weight: bold;
        color: #005E90;
      }
      #heading:hover{
        color: #0090DB;
      }
      .description{
        font-family: Bitter, Georgia, "Times New Roman", Times, serif;
        font-weight: bold;
        color: #868686;
      }
    </style>
  </head>
  <body>
    <h1></h1>
    <!--div style="height:10px; background:#FDD3C9;"></div-->
  <nav class="navbar navbar-expand-lg navbar-light" role="navigation">
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
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="blog.php?Page=1">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Admin</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <form class="form-inline my-2 my-lg-0 ml-auto" action="blog.php?Page=1">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
          <button class="btn btn-outline-none my-2 my-sm-0" type="submit" name="SearchButton"><i class="fa fa-search icon"></i></button>
        </form>
      </ul>
    </div>
  </div>

</nav>
    
    <br><br>
    <div class="container"><!--Container-->
      <div class="blog-header">
        <h1 id="heading" style="color:#C1314B; font-family:"Comic Sans MS", cursive, sans-serif;">A Dreamster in the City.</h1>
        <p class="lead">A blog channel by Anjali Rai about her exploration to new things.</p>
      </div>
      <div class="row"><!--Row-->
        <div class="col-sm-8"><!--Main Blog Area-->
          <?php
          global $ConnectingDB, $Connection;
          if (isset($_GET["SearchButton"])) {
            $Search=$_GET["Search"];
            $ViewQuery="SELECT * FROM admin_panel WHERE dateT LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%$Search%' ORDER BY id desc";
          }
          elseif (isset($_GET["Categories"])) {
            $Category=$_GET["Categories"];
            $ViewQuery="SELECT * FROM admin_panel WHERE category='$Category' ORDER BY id desc";
          }
          elseif (isset($_GET["Page"])) {
            $Page=$_GET["Page"];
            if($Page==0||$Page<1){
              $ShowPostFrom=0;
            }
            else
            {
              $ShowPostFrom=($Page*5)-5;
            }
            $ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom, 5";
          }
          else{
          $ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0, 5";}
          $Execute=mysqli_query($Connection,$ViewQuery);
          while ($DataRows=mysqli_fetch_array($Execute)) {
            $PostID=$DataRows["id"];
            $DateTime=$DataRows["dateT"];
            $Title=$DataRows["title"];
            $Category=$DataRows["category"];
            $Admin=$DataRows["author"];
            $Image=$DataRows["image"];
            $Post=$DataRows["post"];
           ?>
           <div class="blogpost img-thumbnail" style="background-color: #f5f5f5;padding-left: 10px;padding-right: 10px;padding-top: 10px;overflow: hidden;">
             <img class="img-fluid img-rounded" src="Upload/<?php echo $Image; ?>">
             <div class="caption">
               <h2 id="heading" style="color: #eb344c; color: #C1314B;" onMouseOver="this.style.color='#eb344c'"onMouseOut="this.style.color='#C1314B'"><?php echo htmlentities($Title); ?></h2>
               <p class="description" style="color: #868686;font-weight: bold; margin-top: -2px;" >Category: <?php echo htmlentities($Category); ?> | Published On: <?php echo htmlentities($DateTime); ?>
                 <?php
                  global $ConnectingDB, $Connection;
                  $QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostID' AND status='ON'";
                  $QueryExecute=mysqli_query($Connection,$QueryApproved);
                  $RowsApproved=mysqli_fetch_array($QueryExecute);
                  $TotalApproved=array_shift($RowsApproved);
                  if ($TotalApproved>0) {
                 ?>
                 <span class="badge float-right">Comments: <?php echo $TotalApproved; ?></span>
                 <?php } ?>
               </p>
               <p class="post" style="font-size: 1.1em;font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;text-align: justify ;"><?php
                if (strlen($Post)>150) {
                  $Post=substr($Post,0,150).'...';}
                  echo $Post; ?>
               </p>
             </div>
             <a href="FullPost.php?id=<?php echo $PostID; ?>"><span class="btn btn-info" style="float: right;">Read More &rsaquo;</span></a>
           </div>
         <?php } ?>
         <br>
         <nav>
           <ul class="pagination pagination-lg">
             <?php
             if (isset($Page)) {
             if ($Page>1) {
              ?>
              <li class="page-item"><a class="page-link" href="blog.php?Page=<?php echo $Page-1; ?>">&laquo;</a></li>
            <?php } } ?>
         <?php
          global $Connection, $ConnectingDB;
          $QueryPagination="SELECT COUNT(*) FROM admin_panel";
          $ExecutePagination=mysqli_query($Connection,$QueryPagination);
          $RowPagination=mysqli_fetch_array($ExecutePagination);
          $TotalPosts=array_shift($RowPagination);
          //echo $TotalPosts;
          $PostsPerPage=$TotalPosts/5;
          $PostsPerPage=ceil($PostsPerPage);
          //echo $PostsPerPage;
          for ($i=1; $i <= $PostsPerPage; $i++) {
            if (isset($Page)) {
            if ($i==$Page) {
            ?>
                <li class="page-item active"><a class="page-link" href="blog.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } else { ?>
                <li class="page-item"><a class="page-link" href="blog.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

              <?php  }
            }
          }
              ?>
              <?php if (isset($Page)) {
              if ($Page+1<=$PostsPerPage) {
               ?>
               <li class="page-item"><a class="page-link" href="blog.php?Page=<?php echo $Page+1; ?>">&raquo;</a></li>
             <?php } }  ?>
            </ul>
          </nav>
        </div><!--Main Blog Area Ending-->
        <div class="col-sm-offset-1 col-sm-3">
          <h2 style="text-align: center;">About Me</h2>
          <img class="img-fluid img-rounded rounded-circle imageicon" src="images/Profile.jpg" alt=""><br>
          <p style="text-align: center;">Hello!<br>My name is Anjali.<br>This is my blogg.</p>
          <div class="card ">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title">Categories</h5>
            </div>
            <div class="card-body" >
              <?php global $ConnectingDB, $Connection;
              $ViewQuery="SELECT * FROM category ORDER BY id desc";
              $Execute=mysqli_query($Connection,$ViewQuery);
              while($DataRows=mysqli_fetch_assoc($Execute)){
                $Name=$DataRows["name"];
              ?>
              <a href="blog.php?Categories=<?php echo $Name; ?>">
              <span style="color:#C1314B; font-family:cursive, sans-serif; font-weight:bold;"><?php echo $Name; ?></span><br>
              </a>
            <?php } ?>
            </div>
            <div class="card-footer">

            </div>
          </div>
          <br>
          <div class="card ">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title">Recent Posts</h5>
            </div>
            <div class="card-body" style="background-color:#F6F7F9;">
              <?php
              global $ConnectingDB, $Connection;
              $Query="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0, 5";
              $Execute=mysqli_query($Connection,$Query);
              while($DataRows=mysqli_fetch_array($Execute)){
                $ID=$DataRows["id"];
                $Title=$DataRows["title"];
                $DateTime=$DataRows["dateT"];
                if (strlen($DateTime)>11) {
                  $DateTime=substr($DateTime,0,11);
                }
                $Image=$DataRows["image"];
               ?>
               <div>
                 <img class="float-left" style="margin-top:10px; margin-left:10px;" src="Upload/<?php echo $Image; ?>" width="70px;" height="70px;">
                 <a href="fullPost.php?id=<?php echo $ID; ?>">
                 <p id="heading" style="margin-left:90px;"><?php echo htmlentities($Title); ?></p>
                 </a>
                 <p class="description" style="margin-left:90px;"><?php echo htmlentities($DateTime); ?></p>
                 <hr>
               </div>
             <?php } ?>
            </div>
            <div class="card-footer">

            </div>
          </div>
      </div><!--Side Area Ending-->
    </div><!--Row Ending-->
  </div><!--Container Ending-->
  <div id="Footer">
      <hr><p style="
        padding: 10px;
        border-top: 1px solid black;
        color: #eeeeee;
        background-color: #211f22;
        text-align: center;">Theme By | Anjali Rai | &copy; 2019-2020 --- All right reserved.</p></hr>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
