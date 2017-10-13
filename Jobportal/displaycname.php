<?php
include("auth.php"); ?>


<!DOCTYPE html>
<html>
        <head>
                  <title>Company Details - JobPortal</title>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <link rel="stylesheet" type="text/css" href="css/bootstrapmin.css">
                  <link rel="icon" type="image/png" href="img/reunion.png"/>
                   <link rel="stylesheet" type="text/css" href="css/jobform.css">
                  <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
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
                        <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="padding-left: 0px;">
                              <ul class="nav navbar-nav">
                                      <li><a href="findjobs.php">Find Jobs</a></li>
                                       <li><a href="findresumes.php">DashBoard</a></li>
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

                <div class="jobform">
                          <form action="findjobs.php" class="form-inline center_div" method="POST" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <div class="input-group">
                                       <strong>Enter Skills</strong> <input type="text" id="skilltest" name="skilltest" class="form-control" placeholder="Eg: php,java,mysql" required>
                                      </div>
                                  </div>
                                  <div class="form-group">    
                                      <div class="input-group">
                                        <strong>Enter location</strong> <input type="text" id="jobloc" name="jobloc" class="form-control" placeholder="Eg: Hyderabad" required>
                                        
                                      </div>
                                  </div>
                                  <div class="form-group">
                                        <div class="col-sm-offset-2">
                                          <strong>Find Here!</strong><input type="submit" id="submit" name="submit" class="btn btn-success">
                                        </div>
                                 </div>
                         </form>
                </div>
</body>
</html>

<?php
        include ("db.php");
        $search=$_SESSION['email'];
        if(isset($_GET['id'])) {
        $id= $_GET['id'];
        $sql = mysqli_query($conn, "SELECT *FROM empjobs  WHERE id='$id'");
    
        if($row = mysqli_num_rows($sql)) { 
   
          $row = mysqli_fetch_assoc($sql) or die(mysqli_error());

          echo "<form action='' method='POST'>";
          echo '<div class="col-md-8">';
          #echo " <p style='color:black;font-weight:bold;padding-top:30px;'>Company Name: <br/>".$row['cname']."</p>";
          echo " <p style='color:black;font-weight:bold;padding-top:30px;'>Job Title: <br/>".$row['jobtit']."</p>";
          echo   "<p style='color:black;font-weight:bold;'> Company Name: <br/>".$row['cname']."</p>";
          echo "<p style='color:black;font-weight:bold;'> Job Type: <br/>".$row['jobtype'] ."</p>";
          echo "<p style='color:black;font-weight:bold;'>Experience Level:<br/>".$row['explevel']."</p>";
          echo "<p style='color:black;font-weight:bold;'>Job Location: <br/>".$row['jobloc']."</p>";
          echo "<p style='color:black;font-weight:bold;'>Qualification:<br/>".$row['jobqual']."</p>";
          echo "<p style='color:black;font-weight:bold;'>Skills Required:<br/>".$row['skilltest']."</p>";
          echo "<p style='color:black;font-weight:bold;'>Jobs responsibilites:<br/>".$row['respon']."</p>";
          #echo "<p style='color:black;font-weight:bold;'>"."<a class=\"btn btn-success btn-xs\" href=".$row['webaddr']." target='_blank'><strong>Apply</strong></a>";
          echo "<p style='color:black;font-weight:bold;'>"."<input type='submit' name='apply' value='apply'>";
          echo "</form>";
          echo "<br>";
          

        
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['apply']) && $_POST['apply'] == "apply") )  {
      
                         $qry="SELECT * from appliedforjob where id='$id' and email='$search'"; 
                          $res=mysqli_query($conn ,$qry);
                          $result=mysqli_fetch_array($res);
                          #$agin_post_check=$result['count'];
                          if($result>0){
                            ?>
                              <script>
                                alert('you have  already applied in this circular');
                              </script>
                            <?php
                          }
          else {

                        $quer = "INSERT INTO appliedforjob
                        (id, cemail, cname ,jobtit,jobloc, fname, lname, email ,file)
                         VALUES (
                         (SELECT id from empjobs where id = '".$id."'),
                         (SELECT cemail from empjobs where id = '".$id."'),
                         (SELECT cname from empjobs where id = '".$id."'),
                         (SELECT jobtit from empjobs where id = '".$id."'),
                         (SELECT jobloc from empjobs where id = '".$id."'),
                         (SELECT fname  FROM jobseeker WHERE email = '".$search."'),
                         (SELECT  lname FROM jobseeker WHERE email = '".$search."'),
                         (SELECT  email FROM jobseeker WHERE email = '".$search."'),
                         (SELECT  file FROM jobseeker WHERE email = '".$search."')
                        )";
                        $result = mysqli_query($conn, $quer)  or die (mysqli_error($conn));
                        if($result)
                          {
                            ?>
                              <script>
                                alert("applied Successfull");
                                window.location="findjobs.php";
                              </script>
                            <?php
                          }
                          else
                          {
                            ?>
                              <script>
                                alert("Technical Error,please contact admin");
                              </script>
                            <?php
                          }
                          } 
                 }
              }
            }
mysqli_close($conn);
?>