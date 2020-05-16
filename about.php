<!DOCTYPE html>
<html>
<title>About Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
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

/* First image (Logo. Full height) */
.bgimg-1 {
  background-image: url('images/blog.jpg');
  min-height: 100%;
}

/* Second image (Portfolio) */
.bgimg-2 {
  background-image: url("images/lap.jpg");
  min-height: 400px;
}

/* Third image (Contact) */
.bgimg-3 {
  background-image: url("/w3images/parallax3.jpg");
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
<body>

<!-- Navbar (sit on top) -->


  <!-- Navbar on small screens -->
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

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">DREAMSTER <span class="w3-hide-small"></span></span>
  </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">ABOUT ME</h3>
  <p class="w3-center"><em>This is my personal blogging channel</em></p>
  <p>Hey There! Its Anjali Rai. This is my "personal" blogger website, where I post blogs on multidisciplinary fields. I'm an M.C.A student at Institute of Engineering & Technology Lucknow, Dr. A.P.J. Abdul Kalam Technical University. I was born and raised in Varanasi, Uttar Pradesh. I did B.C.A from School of Management Sciences Varanasi, Mahatama Gandhi Kashi Vidyapeeth Varanasi.</p>
  <div class="w3-row">
    <div class="w3-col m6 w3-center w3-padding-large">
      <p><b><i class="fa fa-user w3-margin-right"></i>Anjali Rai</b></p><br>
      <img src="images/Profile.jpg" class="w3-round w3-image" alt="Photo of Me" width="200px" height="200px">
    </div>

    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-hide-small w3-padding-large">
      <p>I've great interest in Programming, have good analytical as well as technical skills and I enjoy applying these skills to my personal projects. I'm looking forward for job opportunities as a full stack developer and apart from that, I am exploring in fields of Data Engineering, and Machine Learning as well. I like to travel. I believe travelling gives you a new perspective to everything. You get to know a lot about the different cultures, the cuisines, their history, the language and all the small unique things every place has to offer. Photography is one of my favorite hobbies too. As it gives me immense pleasure to capture the moments and relive it all over again just by having one glance of it. I have been shooting for some time now. I like playing sports and dancing too, as it refreshes my mood.</p>
    </div>
  </div>
  
</div>



<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
  <a href="https://www.facebook.com/anjali.rai.75248/" class="w3-hover-opacity" style="color: #fff"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
  <a href="https://twitter.com/AnjaliR60880496" class="w3-hover-opacity" style="color: #fff"><i class="fa fa-twitter w3-hover-opacity"></i></a>
  <a href="https://www.linkedin.com/in/anjali-rai-1b51a1162/" class="w3-hover-opacity" style="color: #fff"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
  </div>
  <p><b>&copy; Copyright Anjali Rai | 2020</b></p>
</footer>

<script>


// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
