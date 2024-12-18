<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $name = $_POST['name'];
    $payment_method = $_POST['payment_method'];
    $total_amount = $_POST['total_amount'];

    // You can store this information in a database, if necessary.

    // Redirect to confirmation page with data passed in the URL (using query parameters)
    header("Location: confirmation.php?name=" . urlencode($name) . "&payment_method=" . urlencode($payment_method) . "&total_amount=" . urlencode($total_amount));
    exit();
}
?>
