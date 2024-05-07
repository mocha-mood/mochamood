<?php
$host = 'localhost';
$username = 'mochamood';
$password = 'voipulla';
$database = 'cafe';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>