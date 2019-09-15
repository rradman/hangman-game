<?php
    include("config/config.php");

    $korisnik = $_GET["username"];
    $sifra = $_GET["password"];

    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id FROM admin order by id DESC LIMIT 1";
    $result = $conn->query($sql);
    $last_id = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_id = $row["id"]+1;
    }

    $sql = "INSERT INTO admin (id, username, password)
    VALUES ('{$last_id}', '{$korisnik}', '{$sifra}')";

    if ($conn->query($sql) === TRUE) {
        $sql = "INSERT INTO highscores (username, highscore) VALUES ('{$korisnik}', 0)";
        if ($conn->query($sql) === TRUE) {
            header("location:login.php");
            } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
