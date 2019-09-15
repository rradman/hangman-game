<?php
    include("config/config.php");

    $topic = $_GET["topic"];
    $guess = $_GET["guess"];

    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO rijecnik (topic, rijec)
    VALUES ('{$topic}', '{$guess}')";

    if ($conn->query($sql) === TRUE) {
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("location:index.php");
?>