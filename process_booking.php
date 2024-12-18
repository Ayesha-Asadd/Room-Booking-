<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "Hotel"; // Replace this with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date_from = $_POST['dateFrom'];
$date_to = $_POST['dateTo'];
$num_people = $_POST['numPeople'];
$comments = $_POST['comments'];

// Use prepared statements to insert data into the database securely
$query = "INSERT INTO bookings (first_name, last_name, email, phone, date_from, date_to, num_people, comments) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("ssssssss", $first_name, $last_name, $email, $phone, $date_from, $date_to, $num_people, $comments);

    if ($stmt->execute()) {
        echo "Booking successfully saved!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}


// Close the connection
$stmt->close();
$conn->close();
?>
