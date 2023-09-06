<?php
// Database configuration
$dbHost = "localhost"; // Hostname
$dbUser = "root"; // MySQL username
$dbPassword = ""; // MySQL password
$dbName = "exam"; // Database nam

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?>
