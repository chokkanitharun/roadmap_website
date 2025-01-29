<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "skillroute";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>