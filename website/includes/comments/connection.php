<?php
// Define database connection according to docker-compose (database already exists from there)
$host = 'db';               // Service name
$username = 'julian';       // From MYSQL_USER
$password = 'julianpassword'; // From MYSQL_PASSWORD
$database = 'blogdb';       // From MYSQL_DATABASE

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error . "<br>");
}
$conn->set_charset("utf8mb4");
$conn->select_db("blogdb");
?>