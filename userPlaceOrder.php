<?php
session_start();

// Check if product data is passed from the cart page
if (!isset($_GET['product_id'])) {
    die("No product selected for ordering.");
}

$product_id = $_GET['product_id'];
$product_name = $_GET['product_name'];
$product_price = $_GET['product_price'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the data from the form submission
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $quantity = $_POST['quantity'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "craft";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert order data into the database
    $stmt = $conn->prepare("INSERT INTO orders (product_id, product_name, product_price, quantity, address, payment_method) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isdiis", $product_id, $product_name, $product_price, $quantity, $address, $payment_method);

    if ($stmt->execute()) {
        // Redirect to success page after successful order
        header("Location: userOrderSuccess.php");
        exit();
    } else {
        // Error: show error message
        echo "Error placing the order. Please try again.";
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Order Form</h1>
        
        <form method="POST">
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address:</label>
                <textarea name="address" id="address" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method:</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
            </div>

            <div class="mb-3">
                <p>Product: <?php echo $product_name; ?></p>
                <p>Price: $<?php echo $product_price; ?></p>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</body>
</html>
