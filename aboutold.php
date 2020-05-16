<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="C:/xampp/htdocs/PHPCMSProject/css/publicstyles.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #ffffff;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
           <img src="images/Logonew.png" width="110" height="50" alt="" style="margin-top:-13px;">
          </a>
        </div>
        <button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#collapse">
          &#9776;
        </button>
        <div  id="collapse" class="collapse navbar-collapse ">
        <ul class="nav navbar-nav">
          <li class="nav-item" style="font-weight: bold;font-family: Bitter, Georgia, Times, "Times New Roman", serif;font-size: 1.2em;"><a class="nav-link" href="index.php" style="color:#8B8F8C;">Home</a></li>
          <li class="nav-item" style="font-weight: bold;font-family: Bitter, Georgia, Times, "Times New Roman", serif;font-size: 1.2em;"><a class="nav-link active font-weight-bold" href="blog.php?Page=1" style="color:#8B8F8C;">Blog</a></li>
          <li class="nav-item" style="font-weight: bold;font-family: Bitter, Georgia, Times, "Times New Roman", serif;font-size: 1.2em;"><a class="nav-link" href="about.php" style="color:#8B8F8C;">About</a></li>
          <li class="nav-item" style="font-weight: bold;font-family: Bitter, Georgia, Times, "Times New Roman", serif;font-size: 1.2em;"><a class="nav-link" href="dashboard.php" style="color:#8B8F8C;">Admin</a></li>
          <li class="nav-item" style="font-weight: bold;font-family: Bitter, Georgia, Times, "Times New Roman", serif;font-size: 1.2em;"><a class="nav-link" href="contact.php" style="color:#8B8F8C;">Contact</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0 ml-auto" action="blog.php">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="SearchButton">Search</button>
        </form>
        </div>
      </div>
    </nav>
    <div style="height:10px; background:#FDD3C9;"></div>
    <br><br>
    <div class="container"><!--Container-->
      <div class="row"><!--Row-->
        <div class="col-sm-3">
          <h1 style="color:#C1314B; font-family:"Comic Sans MS", cursive, sans-serif;">About Me</h1>
          <br><br>
          <img class="img-fluid img-rounded rounded-circle imageicon float-left" src="images/Profile.jpg" alt="">
          <br>
      </div><!--Side Area Ending-->
      <div class="col-sm-8">
        <br><br><br><br><br><br>
        <p>Hello!<br>My name is Anjali.<br>This is my blogg. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
    </div><!--Row Ending-->
  </div><!--Container Ending-->
  </body>
</html>
