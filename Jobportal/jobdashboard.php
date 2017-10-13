<?php
include("auth.php"); ?>

<!DOCTYPE html>
<html>
        <head>
                  <title>JobSeeker -DashBoard</title>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <link rel="stylesheet" type="text/css" href="css/bootstrapmin.css">
                  <link rel="icon" type="image/png" href="img/reunion.png"/>
                   <link rel="stylesheet" type="text/css" href="css/jobform.css">
                  <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                                  <li><a href="Jobseek.php">Edit Your Profile</a></li>
                                    <li><a href="findjobs.php">Find Jobs</a></li>
                                     <li><a href="jobdashboard.php">DashBoard</a></li>
                                         
                                
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

<?php


include ("db.php");
$search=$_SESSION['email'];
$sql = "SELECT  id, cname , jobtit, jobloc FROM  appliedforjob where  email='$search'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


 if (mysqli_num_rows($result) > 0) {
                  echo "<div class=\"container\">";
                  echo  "<div class=\"table-responsive\">";
                  echo "<table class=\"table\">";
                  echo "<thead>";
                  echo " <tr> ";
                  echo " <th>Company Name</th>";
                  echo "<th>Job Title</th>";
                  echo "<th>Job Location</th>";
                  echo "<th> Application </th>";
                  echo "</tr>";
                  echo "</thead>";

        while($row = mysqli_fetch_assoc($result)) {

                          echo"<tr class='table_row'>";
                          echo"<td>" . $row['cname'] . "</td>";
                          echo"<td>" . $row['jobtit'] . "</td>";
                          echo"<td>" . $row['jobloc'] . "</td>";
                          echo  " <td>" . "      <input type=\"submit\" class=\"butto\"     id=".$row['id']." name=\"delete\" value='Cancel Application' /> " . "</td>";
                          echo"</tr>";
                   }
                echo"</table>";
}

      if(($_POST['id'])) {

                $id = $_POST['id'];
                $delete = "DELETE FROM appliedforjob WHERE id='$id' and email='$search'";
                $result = mysqli_query($conn, $delete) or die(mysqli_error($conn));
      }

?>




        <script type="text/javascript" >
                $(function() {

                    $(".butto").click(function() {
                        var del_id = $(this).attr("id");
                        var info = 'id=' + del_id;
                        if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                            $.ajax({
                                type : "POST",
                                url : "jobdashboard.php", //URL to the delete php script
                                data : info,
                                success : function() {
                                }
                            });
                            $(this).parents(".record").animate("fast").animate({
                                opacity : "hide"
                            }, "slow");
                        }
                        return false;
                    });
                });
         </script>









