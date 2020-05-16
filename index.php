<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
  <link rel="stylesheet" href="css/publicstyles.css">
</head>
<body>

<!-- Navbar -->
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

<!-- Page content -->
<div class="w3-content page">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="Upload/agra.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="animated bounceInRight" style="animation-delay: 0.5s">Travel</h5>
          <p class="animated bounceInRight" style="animation-delay: 1s">“Live with no excuses and travel with no regrets.”</p>
          <p class="animated bounceInRight" style="animation-delay: 1s">~ Oscar Wilde</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Upload/make.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="animated bounceInRight" style="animation-delay: 0.5s">Beauty</h5>
          <p class="animated bounceInRight" style="animation-delay: 1s">“Beauty, to me is about being comfortable in your own skin. That or a kickass red lipstick.”</p>
          <p class="animated bounceInRight" style="animation-delay: 1s">~ Gwyneth Paltrow</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Upload/foo.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="animated bounceInRight" style="animation-delay: 0.5s">Food</h5>
          <p class="animated bounceInRight" style="animation-delay: 1s">“All you need is love. But a little chocolate now and then doesn't hurt.”</p>
          <p class="animated bounceInRight" style="animation-delay: 1s">~ Charles M. Schulz</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Upload/lo.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="animated bounceInRight" style="animation-delay: 0.5s">Love</h5>
          <p class="animated bounceInRight" style="animation-delay: 1s">“Love takes off masks that we fear we cannot live without and know we cannot live within.”</p>
          <p class="animated bounceInRight" style="animation-delay: 1s">~ James Baldwin</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Upload/nat.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="animated bounceInRight" style="animation-delay: 0.5s">Nature</h5>
          <p class="animated bounceInRight" style="animation-delay: 1s">“Look deep into nature, and then you will understand everything better.”</p>
          <p class="animated bounceInRight" style="animation-delay: 1s">~ Albert Einstein</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Upload/brush.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="animated bounceInRight" style="animation-delay: 0.5s">Art</h5>
          <p class="animated bounceInRight" style="animation-delay: 1s">“Art is the most intense mode of individualism that the world has known.”</p>
          <p class="animated bounceInRight" style="animation-delay: 1s">~ Oscar Wilde</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">DREAMSTER</h3>
    <p class="w3-center"><em>A personal blogging channel</em></p>
    <h4 class="w3-center">Welcome to my website!</h4>
    <p>Hey There! Its Anjali Rai. This is my "personal" blogger website, where I post blogs on multidisciplinary fields. I'm an M.C.A student at Institute of Engineering & Technology Lucknow, Dr. A.P.J. Abdul Kalam Technical University. I was born and raised in Varanasi, Uttar Pradesh. I did B.C.A from School of Management Sciences Varanasi, Mahatama Gandhi Kashi Vidyapeeth Varanasi.</p>
    <div class="w3-row">
      <div class="w3-col m6 w3-center w3-padding-large">
        <p><b><i class="fa fa-user w3-margin-right"></i>Anjali Rai</b></p><br>
        <img src="images/Profile.jpg" class="w3-round w3-image " alt="Photo of Me" width="200px" height="200px">
      </div>

      <!-- Hide this text on small devices -->
      <div class="w3-col m6 w3-hide-small w3-padding-large">
        <p>I've great interest in Programming, have good analytical as well as technical skills and I enjoy applying these skills to my personal projects. I'm looking forward for job opportunities as a full stack developer and apart from that, I am exploring in fields of Data Engineering, and Machine Learning as well. I like to travel. I believe travelling gives you a new perspective to everything. You get to know a lot about the different cultures, the cuisines, their history, the language and all the small unique things every place has to offer. Photography is one of my favorite hobbies too. As it gives me immense pleasure to capture the moments and relive it all over again just by having one glance of it. I have been shooting for some time now. I like playing sports and dancing too, as it refreshes my mood.</p>
      </div>
    </div>

  </div>

  <!-- The Tour Section -->
  <div class="w3-black" id="tour">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">WHAT IS DREAMSTER?</h2>
      <p class="w3-opacity w3-center"><i>Dreamster is my personal blogging channel where I posts blog on multidisciplinary fields of interest. Dreamster is my dream project to posts blog of my interests. Dreamster take you to a tour of magic where you can explore things through my eyes and of my friends who have contributed to this page. Its just not a single blogging channel of travel, it is more than that. Through Dreamster you'll get a new angle towards things like Art, Nature, etc. Along with all these Dreamster also give you a different perspective towards Beauty in things. Apart from all that Dreamster gives you the taste of different cuisine around the glope, and above all that Dreamster also write about Love which is the most needed thing for today's world. Hope this journey of mine and some of my friends and family will give you some enjoyment. Thank You!</i></p><br>

      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
        <div class="w3-third w3-margin-bottom">
          <img src="Upload/beauty.jpg" alt="" style="width:100%; height:143px;" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Beauty</b></p>
            <p class="w3-opacity"></p>
            <p>A beauty blog is a place where you can find posts related to beauty sections.</p>

          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="Upload/kasol.jpg" alt="" style="width:100%; height:143px;" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Travel</b></p>
            <p class="w3-opacity"></p>
            <p>Travel blogging is sharing your travel experiences. Be it a road trip, cultural practices, etc.</p>

          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="Upload/food.jpg" alt="" style="width:100%; height:143px;" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Food</b></p>
            <p class="w3-opacity"></p>
            <p>It is a journal about the food I'm cooking, the stuff I'm eating, or the restaurants I’m visiting</p>

          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="Upload/love.jpg" alt="" style="width:100%; height:143px;" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Love</b></p>
            <p class="w3-opacity"></p>
            <p>Love blogging talks about modern age love, old school love and self love and care.</p>

          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="Upload/nature.jpg" alt="" style="width:100%; height:143px;" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Nature</b></p>
            <p class="w3-opacity"></p>
            <p>It talks about the beauty of nature and talks of how to conserve our Mother Nature.</p>

          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="Upload/art.webp" alt="" style="width:100%; height:143px;" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Art</b></p>
            <p class="w3-opacity"></p>
            <p>It takes you to the artistic journey where you find posts regarding Arts.</p>

          </div>
        </div>
      </div>
    </div>
  </div>


<!-- End Page Content -->
</div>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <a href="https://www.facebook.com/anjali.rai.75248/" class="w3-hover-opacity" style="color: #000"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
  <a href="https://twitter.com/AnjaliR60880496" class="w3-hover-opacity" style="color: #000"><i class="fa fa-twitter w3-hover-opacity"></i></a>
  <a href="https://www.linkedin.com/in/anjali-rai-1b51a1162/" class="w3-hover-opacity" style="color: #000"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
</footer>

<div class="copyrightSection">
      <div class="col-md-12 text-center">
        <p><b>&copy; Copyright Anjali Rai | 2020</b></p>
      </div>
<script>

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
