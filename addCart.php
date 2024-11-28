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

// Handle adding items to the cart
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Initialize cart session if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to cart if not already in it
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }

    header("Location: addCart.php"); // Redirect back to cart display
    exit();
}

// Fetch cart items from the database
$cart = $_SESSION['cart'] ?? [];
$products = [];
if (!empty($cart)) {
    $product_ids = implode(",", $cart);
    $sql = "SELECT id, name, image, price FROM products WHERE id IN ($product_ids)";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
}

// Handle removing items from the cart
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    $_SESSION['cart'] = array_diff($_SESSION['cart'], [$remove_id]);
    header("Location: addCart.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Your Cart</h1>

        <?php if (!empty($products)): ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="fw-bold text-primary">Price: $<?php echo $product['price']; ?></p>
                                <a href="addCart.php?remove_id=<?php echo $product['id']; ?>" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <h3 class="text-center text-muted">Your cart is empty!</h3>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="product.php" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
