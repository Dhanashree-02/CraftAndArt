<?php
// Start session
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "craft";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];


// Fetch the user's order history
$query = "
    SELECT 
        orders.id AS order_id,
        products.name AS product_name,
        products.description AS product_description,
        products.price AS product_price,
        orders.quantity,
        orders.address,
        orders.payment_method,
        orders.order_status,
        orders.created_at
    FROM orders
    JOIN products ON orders.product_id = products.id
    WHERE orders.user_id = ?
    ORDER BY orders.created_at DESC
";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Query Preparation Failed: " . $conn->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Order History</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Your Order History</h2>
        <div class="mt-4">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price (₹)</th>
                            <th>Quantity</th>
                            <th>Total Price (₹)</th>
                            <th>Address</th>
                            <th>Payment Method</th>
                            <th>Order Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['order_id']; ?></td>
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['product_description']); ?></td>
                                <td><?php echo number_format($row['product_price'], 2); ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo number_format($row['product_price'] * $row['quantity'], 2); ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                                <td><?php echo ucfirst($row['order_status']); ?></td>
                                <td><?php echo date("F j, Y, g:i A", strtotime($row['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">No orders found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<?php
// Close the statement and connection
$stmt->close();
$conn->close();
?>
