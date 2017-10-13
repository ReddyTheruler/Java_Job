<!DOCTYPE html>
<html>
<head>
          <title>Employee - Login</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" type="text/css" href="css/bootstrapmin.css">
          <link rel="stylesheet" type="text/css" href="css/style1.css">
          <link rel="icon" type="image/png" href="img/reunion.png"/>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include 'header.php';?>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="form-body">
    <ul class="nav nav-tabs final-login">
        <li class="active"><a data-toggle="tab" href="#sectionA">Log In</a></li>
        <li><a data-toggle="tab" href="Signin.php#sectionB">Register us!</a></li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
        <div class="innter-form">
            <form class="sa-innate-form" action="redirect.php" method="post">
            <label>Email Address</label>
            <input type="text" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit">Log In</button>
            <a data-toggle="tab" href="Signin.php#sectionC">Forgot Password?</a>
            </form>
            </div>
            <div class="social-login">
            <p>- - - - - - - - - - - - - Sign In With - - - - - - - - - - - - - </p>
    		<ul>
            <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
            <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
            </div>
            <div class="clearfix"></div>
        </div>
      <div id="sectionB" class="tab-pane fade">
            <div class="innter-form">
            <form class="sa-innate-form" method="post" action=""  enctype="multipart/form-data">
            <label>Name</label>
            <input type="text" name="username" id="username" required>
            <label>Email Address</label>
            <input type="text" name="email" id="email" required>
            <label>Password</label>
            <input type="password" name="password" id="password" required>
             <input id="submit" name="submit" type="submit" value="Send" class="btn btn-success">
            <p>By clicking Join now, you agree to Satish Jobs User Agreement, Privacy Policy, and Cookie Policy.</p>
            </form>
            </div>
            <div class="social-login">
            <p>- - - - - - - - - - - - - Register With - - - - - - - - - - - - - </p>
            <ul>
            <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
            <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
            </div>
        </div>
   <div id="sectionC" class="tab-pane fade">
			<div class="innter-form">
            <form class="sa-innate-form" method="post">
            
            <label>Enter Email registered</label>
            <input type="text" name="username">
            
            <button type="submit">Send</button>
            <p>Enter your registered Email -Address to get login details</p>
            </form>
            </div>
            <div class="social-login">
            <p>- - - - - - - - - - - - - Register With - - - - - - - - - - - - - </p>
			<ul>
            <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
            <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</body>
</html>

 <?php
  include ("db.php");

   
 if(isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($conn,$_POST['username']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);

if (!mysqli_query($conn,"INSERT INTO register (username, email, password) 
VALUES ('$username', '$email','$password')"))
  {
  echo("Error description: " . mysqli_error($conn));
  }
}
mysqli_close($conn);
?>