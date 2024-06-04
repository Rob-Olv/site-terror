<?php
    $servername = "localhost";
    $username = "root";
    $password = "Rognarok12345@";
    $dbname = "rota_terror";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>