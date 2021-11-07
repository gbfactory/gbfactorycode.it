<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gbcode";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Errore di connessione al database. Contatta l'amministrazione scrivendo a info@gbfactory.net");
}

$conn->set_charset('utf8mb4');
