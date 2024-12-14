<?php
// Include your database connection
include 'db_connection.php';  // Assuming db_connection.php contains the connection code

// Fetch the POST data
$user_ids = $_POST['user_ids'] ?? '';
$order_status = $_POST['order_status'] ?? '';

// Sanitize input
$user_ids = explode(',', $user_ids);  // Convert comma-separated user IDs into an array

// Check if the user_ids array is not empty and order_status is provided
if (!empty($user_ids) && $order_status) {
    // Prepare the placeholders for the query
    $placeholders = implode(',', array_fill(0, count($user_ids), '?'));

    // Build the query to get customer details using JOIN, filtered by order_status
    $query = "
        SELECT u.id, u.name, u.email, o.address, o.created_at 
        FROM users u
        JOIN orders o ON u.id = o.user_id
        WHERE u.id IN ($placeholders) AND o.status = ?
    ";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the user_ids dynamically, followed by the order_status
        $types = str_repeat('i', count($user_ids)) . 's';  // 's' for the order_status (string)
        $params = array_merge($user_ids, [$order_status]);  // Combine user_ids and order_status for binding
        $stmt->bind_param($types, ...$params);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch and display customer details
        if ($result->num_rows > 0) {
            // Display the count of customers
            echo 'Total customers found: ' . $result->num_rows . '<br><br>';

            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo 'Name: ' . $row['name'] . '<br>';
                echo 'Email: ' . $row['email'] . '<br>';
                echo 'Address: ' . $row['address'] . '<br>';
                echo 'Order Date & Time: ' . $row['created_at'] . '<br>';  // Display the order date (created_at)
                echo '</li><br><br>';
            }
            echo '</ul>';
        } else {
            echo 'No customer details found for this order status.';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo 'Error preparing the query: ' . $conn->error;
    }
} else {
    echo 'Invalid user IDs or order status.';
}

// Close the database connection
$conn->close();
?>
