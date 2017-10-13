<?php
	define (DB_USER, "weslokz6_indeed");
	define (DB_PASSWORD, "indeed");
	define (DB_DATABASE, "weslokz6_indeed");
	define (DB_HOST, "localhost");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

			$sql = "SELECT jobseeker.skilltest FROM jobseeker 
					WHERE skilltest LIKE '%".$_GET['q']."%'
					LIMIT 10"; 
			$result = $mysqli->query($sql);

			$json = [];
		while($row = $result->fetch_assoc()){
		     $json[] = ['text'=>$row['skilltest']];
		}

	echo json_encode($json);
?>