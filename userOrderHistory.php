<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "craft";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to view your order history.");
}

$user_id = $_SESSION['user_id'];

// Fetch user's orders
$sql = "SELECT id, total_price, order_date FROM orders WHERE user_id = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error); // Debugging output
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
    <title>Order History</title>
</head>
<body>
    <h1>Your Order History</h1>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Total Price</th>
            <th>Order Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td>$<?php echo number_format($row['total_price'], 2); ?></td>
            <td><?php echo $row['order_date']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
