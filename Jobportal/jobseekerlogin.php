<?php
  include ("db.php");


    session_start();
   
    if (isset($_POST['email'])){
        
        $email = stripslashes($_REQUEST['email']); // removes backslashes
        $email = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        
    
        $query = "SELECT * FROM users WHERE email='$email' and password='$password' ";
        $query1 = "SELECT * FROM jobseeker WHERE email='$email' ";
        $result = mysqli_query($conn,$query) or die(mysqli_error());
        $result1=  mysqli_query($conn,$query1) or die(mysqli_error());
        
        $rows = mysqli_num_rows($result);
        $rows1 = mysqli_num_rows($result1);

        

if ($rows > 0) {
  if($rows==1 && $rows==$rows1){
            $_SESSION['email'] = $email;
            header("Location: Jobseek.php"); // Redirect user to index.php
            } else {

     $_SESSION['email'] = $email;
            header("Location: jobseeker.php"); 
}

} else {
    
     die("Please enter correct username and/or password!");
}



       








}
?>











