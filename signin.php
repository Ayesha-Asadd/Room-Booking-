<?php
// Start session to manage user login session
session_start();

// Database connection settings
$servername = "localhost"; // Use your server details
$username = "root";        // Use your database username
$password = "";            // Use your database password
$dbname = "Hotel";         // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM signup_data WHERE email = ?");
    $stmt->bind_param("s", $email); // 's' means the email is a string
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user info in session
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['user_name'] = $user['name']; // Store user name in session
            
            // Redirect to the landing page after successful login
            header("Location: LandinPage.html"); // Adjust to your landing page or dashboard URL
            exit();
        } else {
            // Invalid password
            echo "Invalid email or password!";
        }
    } else {
        // User not found
        echo "Invalid email or password!";
    }
    
    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
