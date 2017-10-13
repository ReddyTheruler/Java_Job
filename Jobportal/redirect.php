<?php
  include ("db.php");


    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
        
        $email = stripslashes($_REQUEST['email']); // removes backslashes
        $email = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        
    //Checking is user existing in the database or not
        $query = "SELECT * FROM register WHERE email='$email' and password='$password' ";
        $result = mysqli_query($conn,$query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['email'] = $email;
            header("Location: employeeJobfill.php"); // Redirect user to index.php
            }else{
                echo "<h3>Username/password is incorrect.</h3><br/>Click here to <a href='Signin.php'>Login</a>";
                }
}
?>











