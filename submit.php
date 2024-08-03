<?php
$servername = "localhost";
$username = "root";  // Default username for MySQL
$password = "";      // Default password for MySQL
$dbname = "user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$dob = $_POST['dob'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, dob) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $dob);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
