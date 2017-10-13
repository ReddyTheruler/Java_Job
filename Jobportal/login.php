<?php

include ("db.php");
$confirm_code=md5(uniqid(rand())); 
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);


if (!mysqli_query($conn,"INSERT INTO register (confirm_code,username, email, password) VALUES ('confirm_code',$username', '$email','$password')"))
  {

$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: your name <contact@onestoptoyoursearch.com>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.onestoptoyoursearch.com/inde.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
echo "Not found your email in our database";
}

// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}
?>










  echo("Error description: " . mysqli_error($con));
  }




  # if(isset($_POST["submit"])) {
 # $query = mysqli_query($con, "INSERT INTO register (username, email, password) VALUES ('$username', '$email','$password')");
 #}
    #    else {

     # die('Error: ' . mysqli_error($con));
     
      #  }   
    
    mysqli_close($conn);
?>
