<?php
    include("config/config.php");
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$username = $_GET["username"];
	$score = $_GET["score"];

	$sql = "UPDATE highscores SET highscore='{$score}' WHERE username = '{$username}'";
	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
		echo("Super");
	    } 
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	    }
?>