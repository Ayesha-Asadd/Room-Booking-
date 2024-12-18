<?php
// Database connection
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password for XAMPP
$dbname = "Hotel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name_on_card = $_POST['nameOnCard'];
$card_number = $_POST['cardNumber'];
$exp_month = $_POST['month'];
$exp_year = $_POST['year'];
$cvv = $_POST['cvv'];
$payment_method = isset($_POST['payment']) ? $_POST['payment'] : '';

// Insert data into the database
$sql = "INSERT INTO payments (name_on_card, card_number, exp_month, exp_year, cvv, payment_method)
VALUES ('$name_on_card', '$card_number', '$exp_month', '$exp_year', '$cvv', '$payment_method')";

if ($conn->query($sql) === TRUE) {
    echo "Payment successfully recorded!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
