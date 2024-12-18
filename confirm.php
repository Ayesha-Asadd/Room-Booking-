<?php
// Fetch data from the query string
$name = isset($_GET['name']) ? $_GET['name'] : 'N/A';
$payment_method = isset($_GET['payment_method']) ? $_GET['payment_method'] : 'N/A';
$total_amount = isset($_GET['total_amount']) ? $_GET['total_amount'] : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Booking Successful!</h2>
        <p><strong>Name on Card:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($payment_method); ?></p>
        <p><strong>Total Amount Paid:</strong> $<?php echo htmlspecialchars($total_amount); ?></p>
        <p>Thank you for booking with us!</p>
    </div>
</body>
</html>
