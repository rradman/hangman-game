<?php
    include("config/config.php");

	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM highscores ORDER BY highscore DESC LIMIT 10";
	$result = $conn->query($sql);
	$k = 0;
	$username = "";
	$score = "";
	$send_data = "";

	while($row = $result->fetch_assoc()) {
		
		$username = $row["username"];
		$score = $row["highscore"];
		$send_data = $send_data . $username . ":  " . $score . ",";			
	}

	echo($send_data);
?>