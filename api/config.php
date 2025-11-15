<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'live_chat';

// Create Object-Oriented MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
?>