<?php
include("auth.php");  
?>

<?php
include ("db.php");

$search=$_SESSION['email'];
if(isset($_POST['apply'])) 	{
	$query = "INSERT INTO appliedforjob (fname, lname, file) SELECT fname, lname, file FROM jobseeker WHERE email = '".$search."' ";
    $result = mysqli_query($conn, $query) or die ("Error description: " . mysqli_error($conn));
}
mysqli_close($conn);
?>