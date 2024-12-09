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

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Please log in to add items to your cart.");
}

$user_id = $_SESSION['user_id'];

// Add product to cart
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Check if the product is already in the user's cart
    $check_sql = "SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      // Update quantity if the product already exists in the cart
      $row = $result->fetch_assoc();
      $new_quantity = $row['quantity'] + 1;
      $update_sql = "UPDATE cart SET quantity = ? WHERE id = ?";
      $update_stmt = $conn->prepare($update_sql);
      $update_stmt->bind_param("ii", $new_quantity, $row['id']);
      $update_stmt->execute();
  } else {
      // Add new product to the cart
      $insert_sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
      $insert_stmt = $conn->prepare($insert_sql);
      $quantity = 1; // Define $quantity before binding
      $insert_stmt->bind_param("iii", $user_id, $product_id, $quantity);
      $insert_stmt->execute();
  }
  

    header("Location: addCart.php"); // Redirect to cart page
    exit();
}

// Remove product from cart
if (isset($_GET['remove_id'])) {
    $product_id = intval($_GET['remove_id']);
    $delete_sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    header("Location: addCart.php");
    exit();
}

// Update cart quantities
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $product_id => $quantity) {
        $product_id = intval($product_id);
        $quantity = max(1, intval($quantity)); // Ensure at least 1
        $update_sql = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("iii", $quantity, $user_id, $product_id);
        $stmt->execute();
    }
    header("Location: addCart.php");
    exit();
}

// Fetch cart items from the database
$products = [];
$total_items = 0;
$total_price = 0;

$cart_sql = "SELECT p.id, p.name, p.image, p.price, c.quantity 
             FROM cart c 
             JOIN products p ON c.product_id = p.id 
             WHERE c.user_id = ?";
$stmt = $conn->prepare($cart_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
        $total_items += $row['quantity'];
        $total_price += $row['price'] * $row['quantity'];
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
   <title>Craft Loving | Add to Cart</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Your Cart</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="icon" href="img/logo1.png" type="image/x-icon">

   <!-- Google Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
      rel="stylesheet">

   <!-- Icon Font Stylesheet -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="lib/animate/animate.min.css" rel="stylesheet">
   <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
   <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

   <!-- Customized Bootstrap Stylesheet -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="css/style.css" rel="stylesheet">
</head>

<body>

   <!-- Navbar start -->
   <div class="container-fluid nav-bar">
      <div class="container">
         <nav class="navbar navbar-light navbar-expand-lg py-5">
         <img src="img/logo1.png" style="height: 10vh; ">
            <a href="index.php" class="navbar-brand">
               <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark"> Loving </span></h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarCollapse">
               <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <div class="navbar-nav mx-auto">
                  <a href="logout.php" class="nav-item nav-link">Home</a>
                  <a href="service.html" class="nav-item nav-link">Services</a>
                  <a href="product.php" class="nav-item nav-link">Products</a>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu bg-light">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="about.php" class="dropdown-item">About us</a>
                        <a href="contact.php" class="dropdown-item">Contact</a>
                     </div>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a href="#" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                     data-bs-toggle="dropdown">
                     <i class="fas fa-user"></i>
                  </a>
                  <div class="dropdown-menu bg-light dropdown-menu-end">
                     <a href="userDetails.php" class="dropdown-item">Your Account</a>
                     <a href="logout.php" class="dropdown-item btn btn-danger">Logout</a>
                  </div>
               </div>
               <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                  data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
               <a href="addCart.php" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex">
                  <i class="fas fa-shopping-cart"></i>
                  <span class="badge bg-danger"><?php echo $total_items; ?></span>
               </a>
               <a href="wishlist.php" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex">
                  <i class="fas fa-heart"></i>
               </a>
               <a href="userOrderHistory.php"
                  class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Orders</a>
            </div>
         </nav>
      </div>
   </div>
   <!-- Navbar end -->


   <!-- Modal Search Start -->
   <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
         <div class="modal-content rounded-0">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Search by
                  keyword</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
               <div class="input-group w-75 mx-auto d-flex">
                  <input type="search" class="form-control bg-transparent p-3" placeholder="keywords"
                     aria-describedby="search-icon-1">
                  <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal Search End -->


   <!-- Add cart start -->
   <div class="container py-5">
      <h1 class="text-center mb-4">Your Cart</h1>

      <?php if (!empty($products)): ?>
      <form method="post">
         <div class="row">
            <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="card">
                  <img src="<?php echo $product['image']; ?>" class="card-img-top rounded-top product-image img-fluid"
                     alt="<?php echo $product['name']; ?>">
                  <div class="card-body">
                     <h5 class="card-title"><?php echo $product['name']; ?></h5>
                     <p class="fw-bold text-primary">Price: $<?php echo $product['price']; ?></p>
                     <div class="mb-3">
                        <label for="quantity-<?php echo $product['id']; ?>">Quantity:</label>
                        <input type="number" name="quantities[<?php echo $product['id']; ?>]"
                           id="quantity-<?php echo $product['id']; ?>" value="<?php echo $product['quantity']; ?>"
                           min="1" class="form-control w-50">
                     </div>

                     <!-- Remove and Order Button Section -->
                     <div class="text-center mt-4">
                        <!-- Remove Product from Cart -->
                        <a href="addCart.php?remove_id=<?php echo $product['id']; ?>"
                           class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Remove</a>

                        <!-- Order Product Form -->
                        <form method="POST" action="orderProduct.php" class="d-inline">
                           <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                           <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                           <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                           <input type="hidden" name="quantity" value="<?php echo $product['quantity']; ?>">
                           <button type="submit" name="order_product"
                              class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</button>
                        </form>

                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>

         <!-- Total Price Display -->
         <div class="text-center mt-4">
            <h4>Total Price: $<?php echo number_format($total_price, 2); ?></h4>
         </div>

         <!-- Action Buttons -->
         <div class="text-center mt-4">
            <button type="submit" name="update_cart" class="btn btn-primary">Update Cart</button>
            <a href="product.php" class="btn btn-secondary">Continue Shopping</a>
         </div>
      </form>
      <?php else: ?>
      <h3 class="text-center text-muted">Your cart is empty!</h3>
      <?php endif; ?>
   </div>
   <!-- Add cart end -->



   <!-- Footer Start -->
   <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6">
               <div class="footer-item">
                  <h1 class="text-primary">Craft<span class="text-dark">Loving</span></h1>
                  <p class="lh-lg mb-4">"Discover unique handmade treasures and design inspirations on our craft
                     website. Connect with artisans, learn new techniques, and explore exclusive collections in a
                     vibrant community of craft lovers."</p>
                  <div class="footer-icon d-flex">
                     <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href><i
                           class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href><i
                           class="fab fa-twitter"></i></a>
                     <a class="btn btn-primary btn-sm-square me-2 rounded-circle"
                        href="https://www.instagram.com/thecraftshop.in?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                           class="fab fa-instagram"></i></a>
                     <a class="btn btn-primary btn-sm-square rounded-circle" href="#"><i
                           class="fab fa-linkedin-in"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="footer-item">
                  <h4 class="mb-4">Special Facilities</h4>
                  <div class="d-flex flex-column align-items-start">
                     <a class="text-body mb-3" href><i class="fa fa-check text-primary me-2"></i>Home
                        Delivery</a>
                     <a class="text-body mb-3" href><i class="fa fa-check text-primary me-2"></i>Give
                        & Take</a>
                     <a class="text-body mb-3" href><i class="fa fa-check text-primary me-2"></i>24/7
                        Support</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="footer-item">
                  <h4 class="mb-4">Contact Us</h4>
                  <div class="d-flex flex-column align-items-start">
                     <p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                        CraftLoving Store,Pimpri
                        Chinchwad,Pune-411017</p>
                     <p><i class="fa fa-phone-alt text-primary me-2"></i>(+91)
                        8485027287</p>
                     <p><i class="fas fa-envelope text-primary me-2"></i>dhanashree.sonune13@gmail.com</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="footer-item">
                  <h4 class="mb-4">Social Gallery</h4>
                  <div class="row g-2">
                     <div class="col-4">
                        <img src="img/image08.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                     </div>
                     <div class="col-4">
                        <img src="img/image12.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                     </div>
                     <div class="col-4">
                        <img src="img/image13.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                     </div>
                     <div class="col-4">
                        <img src="img/image09.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                     </div>
                     <div class="col-4">
                        <img src="img/image5.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                     </div>
                     <div class="col-4">
                        <img src="img/image06.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Footer End -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>