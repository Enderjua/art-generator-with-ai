<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginTry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database'e bağlanamadı: " . $conn->connect_error);
} 

?>