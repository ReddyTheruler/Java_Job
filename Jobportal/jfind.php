<?php
include("empauth.php");  ?>


<!DOCTYPE html>
<html>
<head>
        <title>Find Resumes -Satish JobPortal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jobform.css">
        <link rel="icon" type="image/png" href="img/reunion.png"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrapmin.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
              $(function() {
                $( "#cloc" ).autocomplete({
                  source: 'search.php'
                });
              });

              $(function() {
                $( "#skilltest" ).autocomplete({
                  source: 'search1.php'
                });
              });
          </script> 
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
    padding-left: 0px;
">
        <ul class="nav navbar-nav">
            <li><a href="jfind.php">Find Resumes</a></li>
            <li><a href="employeeJobfill.php">Post a Job</a></li>
             <li><a href="empjobdashboard.php">DashBoard</a></li>
                 
        
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

      <div class="jobform">
                <form action="" class="form-inline center_div" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group">
                         <strong>Enter Skills</strong> <input type="text" id="skilltest" name="skilltest" class="form-control" placeholder="Eg: php,java,mysql" required>
                        </div>
                    </div>
                    <div class="form-group">    
                        <div class="input-group">
                          <strong>Enter location</strong> <input type="text" id="cloc" name="cloc" class="form-control" placeholder="Eg: Hyderabad" required>
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2">
                      <strong>Find Here!</strong><input type="submit" id="search" name="search" class="btn btn-success">
                    </div>
                  </div>
                </form>
        </div>

</html>
  
         


<?php
error_reporting( error_reporting() & ~E_NOTICE );
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "indeed";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}
      $skilltest="";
      $cloc="";
      $skilltest= $_POST['skilltest'];
      $cloc= $_POST['cloc'];



$sql = mysqli_query($conn, "SELECT *FROM jobseeker  WHERE skilltest='$skilltest' AND cloc='$cloc'");

if(mysqli_num_rows($sql) > 0)  {
      while($row = mysqli_fetch_array($sql)) {  
   
                  echo '<div class="col-md-8">';
                  echo "<br>";
                  echo "<br>";
                  echo "<h4 class=\"myclass\">".$row['headline']."</h4>"; 
                  echo $row['fname']; 
                  echo $row['lname'];
                  echo "<br>";
                  echo $row['jobqual'];
                  echo "<a class=\"btn btn-success btn-xs view-pdf\" href ='uploads/". $row['file'] . "'>View Resume</a>";
                  echo "<br>";
                  echo"</div>";
            }
        }
else {


}
$conn->close();
?>



























<script type="text/javascript">

/*
* This is the plugin
*/
(function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
$(function(){    
    $('.view-pdf').on('click',function(){
        var pdf_link = $(this).attr('href');
        //var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
        //var iframe = '<object data="'+pdf_link+'" type="application/pdf"><embed src="'+pdf_link+'" type="application/pdf" /></object>'        
        var iframe = '<object type="application/pdf" data="'+pdf_link+'" width="100%" height="500">No Support</object>'
        $.createModal({
            title:'Resume',
            message: iframe,
            closeButton:true,
            scrollable:false
        });
        return false;        
    });    
})


</script>
