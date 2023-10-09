<?php
// Database connection parameters (modify these as needed)
$servername = "localhost";
$username = "rupa";
$password = "29112004";
$database = "rupa";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password (assuming it's stored as a hashed value in the database)
$hashed_password = md5($password); // You should use a more secure hashing method

// Query the database to check if the user exists
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, retrieve user data
    $user_data = $result->fetch_assoc();

    // You can use $user_data to display user information or perform other actions
    echo "Welcome, " . $user_data['username'];
} else {
    echo "Login failed. Please check your username and password.";
}

// Close the database connection
$conn->close();
?>
