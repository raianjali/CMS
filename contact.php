<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Contact Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
  height: 100%;
  color: #777;
  line-height: 1.8;
}

/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* image (Contact) */
.bgimg-3 {
  background-image: url("images/contact.jpg");
  min-height: 400px;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1600px) {
  .bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: scroll;
    min-height: 400px;
  }
}
</style>
  <link rel="stylesheet" href="css/publicstyles.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" role="navigation">
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
    <div style="height:10px; background:#FDD3C9;"></div>
    <!-- Third Parallax Image with Portfolio Text -->
    <div class="bgimg-3 w3-display-container w3-opacity-min">
      <div class="w3-display-middle">
         <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
      </div>
    </div>

    <!-- Container (Contact Section) -->
    <div class="w3-content w3-container w3-padding-64" id="contact">
      <h3 class="w3-center">Contact</h3>


      <div class="w3-row w3-padding-32 w3-section">
        <div class="w3-col m4 w3-container">
          <img src="images/loc.jpg" class="w3-image w3-round" style="width:100%">
        </div>
        <div class="w3-col m8 w3-panel">
          <div class="w3-large w3-margin-bottom">
            <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Bangalore, India<br>
            <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +91 9559610243<br>
            <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: raianjali280397@gmail.com<br>
          </div>


        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
      <div class="w3-xlarge w3-section">
        <a href="https://www.facebook.com/anjali.rai.75248/" class="w3-hover-opacity" style="color: #fff"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
  <a href="https://twitter.com/AnjaliR60880496" class="w3-hover-opacity" style="color: #fff"><i class="fa fa-twitter w3-hover-opacity"></i></a>
  <a href="https://www.linkedin.com/in/anjali-rai-1b51a1162/" class="w3-hover-opacity" style="color: #fff"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
      </div>
      <p><b>&copy; Copyright Anjali Rai | 2020</b></p>
      
    </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
