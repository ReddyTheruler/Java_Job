<?php
include("empauth.php");  ?>


<!DOCTYPE html>
<html>
          <head>
                  <title>Employee - DashBoard</title>
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
                            <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="padding-left: 0px;">
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


<?php
include ("db.php");

$search=$_SESSION['email'];
$sql = "SELECT * FROM  appliedforjob where  cemail='$search'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
                      echo "<div class=\"container\">";
                      echo  "<div class=\"table-responsive\">";
                      echo "<table class=\"table\">";
                      echo "<thead>";
                      echo " <tr> ";
                      echo " <th>JobTitle</th>";
                      echo " <th>First Name</th>";
                      echo "<th>Last Name</th>";
                      echo "<th>Email</th>";
                      echo "<th> Candidate Resume </th>";
                      echo "<th>Mail to Hire </th>";
                      echo "</tr>";
                      echo "</thead>";

 while($row = mysqli_fetch_assoc($result)) {

                    echo"<tr class='table_row'>";
                    echo"<td>" . $row['jobtit'] . "</td>";
                    echo"<td>" . $row['fname'] . "</td>";
                    echo"<td>" . $row['lname'] . "</td>";
                    echo"<td>" . $row['email'] . "</td>";
                    echo "<td><a class=\"btn btn-success btn-xs view-pdf\" href ='uploads/". $row['file'] . "'>View Resume</a><td>";
                    echo "<td><a class=\"btn btn-info btn-xs btn1 \" href='#' >Schedule Interview</a></td>"; 
                    echo "</tr>";
                    }
echo "</table>";
}

?>

<script type="text/javascript">
(function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);
$(function(){    
    $('.view-pdf').on('click',function(){
        var pdf_link = $(this).attr('href');
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

<script>
/* Latest compiled and minified JavaScript included as External Resource */
$('.btn1').click(function(){
    $('.modal').modal('show');
});

//Or use this
//$('.btn').click(function(){
//    $('.modal').modal('show');
//});

</script>


<div id="login">
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i>

                    </button>
                     <h4 class="modal-title" id="mySmallModalLabel">Send Interview Schedule</h4>

                </div>
                <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" action="">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">From Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="femail" value="<?php echo $_SESSION['email']; ?>" placeholder="Email" disabled/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">To Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="temail" name="temail" value=""  placeholder="Email" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Interview</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" rows="8" id="comment" name="comment" placeholder="Dear Candidate
                         Your Interview has ...
                            "></textarea>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" id=submit" name="submit" class="btn btn-info ">Send</button>
                    </div>
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php



include ("db.php");
if(isset($_POST['submit']))
{
$temail=$_POST['temail'];
$comment=$_POST['comment'];
$sql=mysqli_query($conn,"INSERT INTO shortlist(`temail`,`comment`) VALUES ('$temail','$comment')");

$to = $temail;
$subject = "New Email Address for Mailing List";
$headers = 'From: jobs@globalworksource.net' . "\r\n";
$message = "A visitor to your site has sent the following email address to be added to your mailing list.\n
Name: $temail \n
Comment : $comment";

mail($to,$subject,$message,$headers);





}
?>





