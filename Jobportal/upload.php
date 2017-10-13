<?php
error_reporting(E_ALL ^ E_NOTICE);
$servername = "localhost";
$username = "weslokz6_indeed";
$password = "indeed";
$dbname = "weslokz6_indeed";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['btn-upload']))
{    
$location = $_POST['location'];
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	move_uploaded_file($file_loc,$folder.$file);
	
	}


$sql = "INSERT INTO pdff VALUES ('$location' , '$file' , '$file_type' , '$file_size')";

    if($conn->query($sql) === TRUE)
    {
        echo "Complaint Registered";`enter code here`;
    }
    else
    {
        echo "ERROR".$sql."<br>".$conn->error;
    }

$conn->close();



?>