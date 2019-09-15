<?php
    include("config/config.php");
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$word = $_GET["odabrana_rijec_save"];
	$word2 = $_GET["guess"];
	//$word = "RIJEKA";

	$sql = "SELECT * FROM rijecnik where rijec = '{$word}' LIMIT 1";
	$result = $conn->query($sql);
	$odabrana_rijec = "";

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$odabrana_rijec = $row["topic"];
		echo($odabrana_rijec);
	}
?>