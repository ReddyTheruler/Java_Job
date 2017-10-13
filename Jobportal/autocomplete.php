<?php

  include ("db.php");
  $term = $_GET['term'];
  $term = mysqli_real_escape_string($mysqli, $term);
  $output = array();

  $sql = "SELECT skilltest FROM jobseeker WHERE skilltest LIKE '" . $term . "%';";
  $result = mysqli_query($mysqli,$sql) or die(mysqli_error());

  while($row=mysqli_fetch_array($result))
          {
            $output[] = $row['skilltest'];
          }

  mysqli_close($mysqli);
  echo json_encode($output);
?>