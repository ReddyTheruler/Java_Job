<?php
include("empauth.php"); ?>

<!DOCTYPE html>
<html>
<head>
            <title>Employee - Post a Job</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="css/bootstrapmin.css">
            <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
            <META Http-Equiv="Cache-Control" Content="no-cache">
            <META Http-Equiv="Pragma" Content="no-cache">
            <META Http-Equiv="Expires" Content="0">
            <link rel="icon" type="image/png" href="img/reunion.png"/>
            <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
            <script src="js/style.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           
</head>
<body>
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

            
                <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="
                padding-left: 0px;">
                  <ul class="nav navbar-nav">
                      
                       <li><a href="jfind.php">Find Resumes</a></li>
                       <li><a href="employeeJobfill.php">Post a Job </a></li>
                      <li><a href="empjobdashboard.php">DashBoard</span></a>       
                  
                </li>
                  </ul>
                 
                  <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 
                                   <p>Welcome <?php echo $_SESSION['email']; ?>!</p>
                                  
                              </a>
                             
                      <li class="dropdown">
                           <a href="logout.php" >Logout</a>
                    <li>
               </div>
            </div>
          </nav>

<div class="container">
                           <form class="form-horizontal" role="form" method="post" action="">
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Company Name</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Company Name ex: Infosys" value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Email ID</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="emailid" name="emailid" placeholder=" example@jobs.com" value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Contact Num</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="contnum" name="contnum" placeholder="Enter your Contact Number " value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Job Title</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="jobtit" name="jobtit" placeholder="Looking for Jr.Developer - Javascript " value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Job Type</label>
                                  <div class="col-sm-10">
                                        <select class="form-control" name="jobtype" id="jobtype">
                                                                                                <option>FullTime</option>
                                                                                                <option>Parttime</option>
                                                                                                <option>Temporary</option>
                                                                                                 <option>Contract</option>
                                                                                                  <option>Internship</option>
                                                                                                   <option>Walkin</option>
                                                                                        </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Experience level</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="explevel" name="explevel" placeholder="Ex: Freshers or 2" value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Job Location</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="jobloc" name="jobloc" placeholder="Ex: Hyderabad" value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Date</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="jobdate" name="jobdate" placeholder="Enter ASAP or Start and End Dates" value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="email" class="col-sm-2 control-label">Responsibilites</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control" rows="4" name="respon" id="respon"></textarea>
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
                                  <label for="email" class="col-sm-2 control-label">Apply Link</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="webaddr" name="webaddr" placeholder="Enter company Website" value="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="message" class="col-sm-2 control-label">Additonal Info</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control" rows="2" name="adds" id="adds"></textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="message" class="col-sm-2 control-label">Enter Registred Mail-ID</label>
                                  <div class="col-sm-10">
                                       <input type="text" class="form-control" name="cemail" id="cemail"></textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-10 col-sm-offset-2">
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
              $cname = mysqli_real_escape_string($conn,$_POST['cname']);
              $emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
              $contnum = mysqli_real_escape_string($conn,$_POST['contnum']);
              $jobtit = mysqli_real_escape_string($conn,$_POST['jobtit']);
              $jobtype = mysqli_real_escape_string($conn,$_POST['jobtype']);
              $explevel = mysqli_real_escape_string($conn,$_POST['explevel']);
              $jobloc  = mysqli_real_escape_string($conn,$_POST['jobloc']);
              $jobdate = mysqli_real_escape_string($conn,$_POST['jobdate']);
              $respon = mysqli_real_escape_string($conn,$_POST['respon']);
              $jobqual = mysqli_real_escape_string($conn,$_POST['jobqual']);
              $skilltest = mysqli_real_escape_string($conn,$_POST['skilltest']);
              $webaddr = mysqli_real_escape_string($conn,$_POST['webaddr']);
              $adds = mysqli_real_escape_string($conn,$_POST['adds']);
              $cemail = mysqli_real_escape_string($conn,$_POST['cemail']);

if (!mysqli_query($conn,"INSERT INTO empjobs (cname, emailid, contnum, jobtit, jobtype, explevel, jobloc, jobdate , respon, jobqual, skilltest, webaddr, adds , cemail) 
VALUES ('$cname', '$emailid','$contnum','$jobtit','$jobtype','$explevel','$jobloc','$jobdate','$respon','$jobqual','$skilltest','$webaddr','$adds' , '$cemail')"))
  {
  echo("Error description: " . mysqli_error($conn));
  }
}

 mysqli_close($conn);
?>