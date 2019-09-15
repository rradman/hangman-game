<?php
    include("config/config.php");
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM active_user LIMIT 1";
	$result = $conn->query($sql);

	$trenutni_korisnik = "";
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$trenutni_korisnik = $row["username"];
	}

	$sql = "SELECT * FROM highscores where username = '{$trenutni_korisnik}' LIMIT 1";
	$result = $conn->query($sql);

	$trenutni_korisnik = "";
	$highscroe = 0;
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$trenutni_korisnik = $row["username"];
		$highscore = $row["highscore"];
	}
	$odgovor = $trenutni_korisnik . "_" . $highscore;

	echo($odgovor);
?>