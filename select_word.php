<?php
    include("config/config.php");
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM rijecnik ORDER BY rand() LIMIT 1"; //nasumican odabir iz baze
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$odabrana_rijec = $row["rijec"];
		echo($odabrana_rijec);
	}
?>