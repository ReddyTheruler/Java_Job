<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php"); //include auth.php file on all secure pages ?>



<?php 

$con=mysqli_connect("localhost","weslokz6_indeed","indeed","weslokz6_indeed");
    if (mysqli_connect_errno($con))
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$search=$_SESSION['email'];


  if(isset($_POST['submit']))
  {

 $fname = mysqli_real_escape_string($con,$_POST['fname']);
$lname = mysqli_real_escape_string($con,$_POST['lname']);
$headline = mysqli_real_escape_string($con,$_POST['headline']);
$cloc = mysqli_real_escape_string($con,$_POST['cloc']);
$contnum = mysqli_real_escape_string($con,$_POST['contnum']);
$jobqual = mysqli_real_escape_string($con,$_POST['jobqual']);
$skilltest  = mysqli_real_escape_string($con,$_POST['skilltest']);
$file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);


if (!mysqli_query($con,"UPDATE jobseeker SET 
  fname='$fname', lname='$lname', headline='$headline', cloc='$cloc', contnum='$contnum', jobqual='$jobqual', skilltest='$skilltest', file='$file', type='$file_type', size='$file_size' where email='$search'"))

  {
  echo("Error description: " . mysqli_error($con));
  }

}
?>
