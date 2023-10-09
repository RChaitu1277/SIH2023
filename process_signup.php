<?php
// Establish a database connection (modify these values as needed)
$servername = "localhost";
$username = "rupa";
$password = "29112004";
$database = "rupa";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO users (username, password ) VALUES ('$username',  '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Sign-up successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
