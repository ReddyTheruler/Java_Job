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