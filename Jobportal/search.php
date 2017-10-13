<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'indeed';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM jobseeker WHERE cloc LIKE '%".$searchTerm."%' ");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['cloc'];
}
//return json data
echo json_encode($data);
?>