<!DOCTYPE html>
<html>
<head>
   <title>Find Jobs -Satish JobPortal</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/bootstrapmin.css">
   <link rel="icon" type="image/png" href="img/reunion.png"/>
   <link rel="stylesheet" type="text/css" href="css/jobform.css">
   <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 
</head>


<body>
   <?php include 'header.php';?>



<div class="jobform">

              <form action="" class="form-inline center_div" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                      <div class="input-group">
                       
                       <strong>Enter Skills</strong> <input type="text" list="languages" id="skilltest" name="skilltest" class="form-control" placeholder="Eg: php,java,mysql"  required>
                        <datalist id="languages">
                                        <option value="html" />
                                        <option value="PHP" />
                                        <option value="C++" />
                                        <option value="Java" />
                                        <option value="Ruby" />
                                        <option value="Python" />
                                        <option value="Go" />
                                        <option value="Perl" />
                                        <option value="Erlang" />
                                        <option value="web" />
                                        <option value="SAP" />
                        </datalist>



                      </div>
                  </div>
                  <div class="form-group">    
                            <div class="input-group">
                             <strong>Enter location</strong> <input type="text" list="locations" id="jobloc" name="jobloc" class="form-control" placeholder="Eg: Hyderabad" required> 
                                <datalist id="locations">
                                        <option value="Hyderabad" />
                                        <option value="bangalore" />
                                        <option value="chennai" />
                                        <option value="Delhi" />
                                        <option value="Noida" />
                                        <option value="Pune" />
                                        <option value="Mumbai" />
                                        <option value="India" />
                                
                                </datalist>
                            </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-2">
                    <strong>Find Here!</strong><input type="submit" id="submit" name="submit" class="btn btn-success">
                  </div>
                </div>
              </form>
</div>
</html>


<?php

include ("db.php");

if(isset($_POST['submit']))
{    
$skilltest = $_POST['skilltest'];
$jobloc = $_POST['jobloc'];
$sql = mysqli_query($conn, "SELECT *FROM empjobs  WHERE skilltest='$skilltest' AND jobloc='$jobloc'");
if($row = mysqli_num_rows($sql)) { 

 $row = mysqli_fetch_assoc($sql) or die(mysqli_error());
          echo '<div class="col-md-8">';
          echo "<a class=\"myclass\" href='displaycname.php?cname=".$row['cname'] . "' target='_blank'><h3>".$row['cname']."</h3></a>"; 
          echo $row['jobtit']; 
          echo "<br>";
          echo $row['jobloc'];
          echo "<br>";
          echo $row['jobqual'];
          echo "<br>";  
          echo "<br>";
}
}
$conn->close();
?>


