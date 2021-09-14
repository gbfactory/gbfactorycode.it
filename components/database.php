<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gbcode";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');
