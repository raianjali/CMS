<?php
require_once("Include/DB.php");
require_once("Include/sessions.php");
require_once("Include/functions.php");

?>
<?php
if (isset($_POST["Submit"])) {
  $Username=$_POST["username"];
  $Password=$_POST["password"];
  if (empty($Username)||empty($Password)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled out.";
    Redirect_to("login.php");
  }
  else{
    $found_Account=Login_Attempt($Username,$Password);
    $_SESSION["Username"]=$found_Account["username"];
    $_SESSION["User ID"]=$found_Account["id"];
    if($found_Account){
      $_SESSION["SuccessMessage"] = "Welcome {$_SESSION["Username"]}";
      Redirect_to("dashboard.php");

    }
    else {
      $_SESSION["ErrorMessage"] = "Invalid User.";
      Redirect_to("login.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
  <link rel="stylesheet" href="css/publicstyles.css">
    <style>
    .FieldInfo{
      color: rgb(47,79,79);
      font-family: Bitter, Georgia, "Times New Roman", Times, serif;
      font-size: 1.2em;
    }
    body{
      
      margin: 0;
      padding: 0;
      background: url(Upload/login.jpg);
      background-size: cover;
      background-position: center;
      font-family: sans-serif;
    }

    </style>
  </head>
  <body>
    
    <div class="container-fluid">
      <div class="row">



        <!--Ending of side area-->
        <div class="offset-sm-4 col-sm-4">
          
          <br><br><br><br>
          <h2 style="color: #fff;">Welcome Back!</h2>
          <?php echo message();
           echo successMessage();
          ?>
          <br><br>
          <div class="">
            <a href="index.php">
            <img src="images/Logonew2.png" width="100px" height="100px" alt="" style="margin-top:-13px; margin-left: 190px;">
            </a>
            <form class="" action="login.php" method="post">
              <fieldset>
                <div class="form-group">
                  <label for="username"><span class="FieldInfo" style="color: #fff;"><b>Username:</b></span></label>
                  <div class="input-group mb-3">
                    <span class="input-group-text fa fa-user">
                    </span>
                  <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                </div>
              </div>
              <div class="form-group">
                <label for="password"><span class="FieldInfo" style="color: #fff;"><b>Password:</b></span></label>
                <div class="input-group mb-3">
                  <span class="input-group-text fa fa-lock">
                  </span>
                  <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                </div>
              </div>
                <br>
                <input class="btn btn-info btn-block" type="Submit" name="Submit" value="Login">
              </fieldset>
              <br>
            </form>
          </div>
        <!--Ending of main area-->
      </div><!--Ending of Row-->
    </div><!--Ending of container-fluid-->
    <br>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
