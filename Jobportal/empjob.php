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

                if (!mysqli_query($conn,"INSERT INTO empjobs (cname, emailid, contnum, jobtit, jobtype, explevel, jobloc, jobdate , respon, jobqual, skilltest, webaddr, adds) 
                VALUES ('$cname', '$emailid','$contnum','$jobtit','$jobtype','$explevel','$jobloc','$jobdate','$respon','$jobqual','$skilltest','$webaddr','$adds')"))
                  {
                  echo("Error description: " . mysqli_error($conn));
                  }
        }
         mysqli_close($con);
?>