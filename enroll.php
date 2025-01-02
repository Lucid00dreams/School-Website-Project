<?php
// Database Credentials
$servername = "localhost:8080";
$username = "root";
$password = ""; 
$dbname = "enrol";

// Create Database Connection
$conn = new mysqli("$localhost:8080,$enrol");

// Check Connection
if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

// Retrieve Form Data
$name = $_POST["YourName"]; 
$email = $_POST["YourEmail"];
$selectedClass = $_POST["SelectAclass"]; 

// Prepare and Execute SQL Statement
$sql = "INSERT INTO enroll (Name, Email, SelectClass) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
  $stmt->bind_param("sss", $name, $email, $selectedClass);
  $stmt->execute();
  echo "Enrollment completed!";
} else {
  echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

?>