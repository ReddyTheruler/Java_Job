<?php
include("auth.php"); ?>

<!DOCTYPE html>
<html>
<head>
          <title>Job Seeker</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" type="text/css" href="css/bootstrapmin.css">
          <link rel="icon" type="image/png" href="img/reunion.png"/>
          <script src="js/style.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="index.php">Satish Jobs</a> 
    </div>
<div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="padding-left: 0px;">
        <ul class="nav navbar-nav">
            <li><a href="findjobs.php">Find Jobs</a></li>
             <li><a href="jobdashboard.php">DashBoard</a></li>
        </li>
        </ul>
       
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>Welcome <?php echo $_SESSION['email']; ?>!</p>
                    </a> 
                   
            <li class="dropdown">
                 <a href="index.php" >Logout</a>
            <li>
    </div>
  </div>
</nav>

<div class="container">
    <form class="form-horizontal" role="form" method="post" action=" " enctype="multipart/form-data">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your First Name" value="">
        </div>
    </div>
	<div class="form-group">
        <label for="name" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last Name" value="">
        </div>
    </div>
<div class="form-group">
        <label for="name" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" placeholder="Re Enter Email-Id" value="">
        </div>
    </div>

	<div class="form-group">
        <label for="name" class="col-sm-2 control-label">Headline</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="headline" name="headline" placeholder="Web developer with 3.5+ yrs experience" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Location</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="cloc" name="cloc" placeholder="Enter your Location" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Contact Num</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="contnum" name="contnum" placeholder="Enter your Contact Number " value="">
        </div>
    </div>
	<div class="form-group">
        <label for="email" class="col-sm-2 control-label">Qualification</label>
        <div class="col-sm-10">
           <select class="form-control" name="jobqual" id="jobqual">
                                                                                  <option>Doctorate</option>
                                                                                  <option>Post-Graduate</option>
                                                                                  <option>Graduate</option>
                                                                                   <option>Diploma</option>
                                                                                    <option>High School</option>
                                                 
                                                                    </select>
         </div>
    </div>
	<div class="form-group">
        <label for="email" class="col-sm-2 control-label">Skills</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="skilltest" name="skilltest" placeholder="Ex: Java , HTML , CSS" value="">
        </div>
    </div>
  	<div class="form-group">
        <label for="message" class="col-sm-2 control-label">Upload CV *Only PDF</label>
        <div class="col-sm-10">
           <input type="file" name="file" id="file" />
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-success">
      </div>
        
    </div>
    
</form>
</div>


</body>
</html>


<?php
include ("db.php");

if(isset($_POST['submit'])) {
            $fname = mysqli_real_escape_string($conn,$_POST['fname']);
            $lname = mysqli_real_escape_string($conn,$_POST['lname']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $headline = mysqli_real_escape_string($conn,$_POST['headline']);
            $cloc = mysqli_real_escape_string($conn,$_POST['cloc']);
            $contnum = mysqli_real_escape_string($conn,$_POST['contnum']);
            $jobqual = mysqli_real_escape_string($conn,$_POST['jobqual']);
            $skilltest  = mysqli_real_escape_string($conn,$_POST['skilltest']);
            $file = rand(1000,100000)."-".$_FILES['file']['name'];
             $file_loc = $_FILES['file']['tmp_name'];
             $file_size = $_FILES['file']['size'];
             $file_type = $_FILES['file']['type'];
             $folder="uploads/";
            move_uploaded_file($file_loc,$folder.$file);

if (!mysqli_query($conn,"INSERT INTO jobseeker (fname, lname, email, headline, cloc, contnum, jobqual, skilltest, file, type, size) 
VALUES ('$fname' , '$lname', '$email', '$headline', '$cloc', '$contnum', '$jobqual', '$skilltest', '$file' , '$file_type' , '$file_size')"))
  {
  echo("Error description: " . mysqli_error($conn));
  }
}
mysqli_close($conn);
?>

<?php 
include ("db.php");
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  if(isset($_POST['update']))
  {
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $headline = mysqli_real_escape_string($conn,$_POST['headline']);
    $cloc = mysqli_real_escape_string($conn,$_POST['cloc']);
    $contnum = mysqli_real_escape_string($conn,$_POST['contnum']);
    $jobqual = mysqli_real_escape_string($conn,$_POST['jobqual']);
    $skilltest  = mysqli_real_escape_string($conn,$_POST['skilltest']);
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
     $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="uploads/";
 
    move_uploaded_file($file_loc,$folder.$file);


    if (!mysqli_query($conn,"UPDATE jobseeker SET 
      fname='$fname', lname='$lname', headline='$headline', cloc='$cloc', contnum='$contnum', jobqual='$jobqual', skilltest='$skilltest', file='$file', type='$file_type', size='$file_size' where email='$email'"))

      {
      echo("Error description: " . mysqli_error($conn));
      }

    }
    }
