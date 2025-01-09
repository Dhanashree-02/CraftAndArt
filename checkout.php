<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "craft"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
   header('Location: userLogin.php');
   exit();
}

// Fetch user ID
$user_id = $_SESSION['user_id'];

// Initialize error message
$error = "";

// Calculate total price if cart is not empty
$totalPrice = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
   foreach ($_SESSION['cart'] as $item) {
      $totalPrice += $item['price'] * $item['quantity'];
   }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Get address components
   $house_no = htmlspecialchars($_POST['house_no']);
   $street_name = htmlspecialchars($_POST['street_name']);
   $city = htmlspecialchars($_POST['city']);
   $district = htmlspecialchars($_POST['district']);
   $state = htmlspecialchars($_POST['state']);
   $pincode = htmlspecialchars($_POST['pincode']);
   $payment_method = htmlspecialchars($_POST['payment_method']);

   // Combine address components
   $address = "$house_no, $street_name, $city, $district, $state, $pincode";

   // Check if cart is not empty and calculate total price
   if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {

      // Insert order details into the database
      $orderQuery = "INSERT INTO orders (user_id, total_price, status, address, payment_method) 
                       VALUES (?, ?, 'pending', ?, ?)";
      $orderStmt = $conn->prepare($orderQuery);

      if (!$orderStmt) {
         die("Prepare failed: " . $conn->error); // Debugging: Output SQL error
      }

      $orderStmt->bind_param('idss', $user_id, $totalPrice, $address, $payment_method);

      if ($orderStmt->execute()) {
         $order_id = $orderStmt->insert_id;

         // Add items to order_items
         foreach ($_SESSION['cart'] as $item) {
            $itemTotalPrice = $item['price'] * $item['quantity']; // Calculate total price per item
            $itemQuery = "INSERT INTO order_items (order_id, product_id, quantity, total_price) 
                              VALUES (?, ?, ?, ?)";
            $itemStmt = $conn->prepare($itemQuery);

            if (!$itemStmt) {
               die("Prepare failed: " . $conn->error); // Debugging: Output SQL error
            }

            $itemStmt->bind_param('iiid', $order_id, $item['product_id'], $item['quantity'], $itemTotalPrice);
            $itemStmt->execute();
         }

         // Clear cart
         unset($_SESSION['cart']);

         // Redirect to success page
         // Redirect to success page with the order_id as a URL parameter
         header('Location: success.php?order_id=' . $order_id);
         exit();

      } else {
         $error = "Failed to place order. Error: " . $conn->error; // Include SQL error in the message
      }
   } else {
      $error = "Your cart is empty. Please add items to the cart before placing an order.";
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Craft Loving | Menu </title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content name="keywords">
   <meta content name="description">
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

   <!-- Spinner Start -->
   <div id="spinner"
      class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
   </div>
   <!-- Spinner End -->

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
                  <a href="service.php" class="nav-item nav-link">Services</a>
                  <a href="product.php" class="nav-item nav-link">Products</a>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu bg-light">
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
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
               <!-- <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                  data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button> -->
               <a href="addCart.php"
                  class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"><i
                     class="fas fa-shopping-cart"></i></a>
               <a href="wishlist.php" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex">
                  <i class="fas fa-heart"></i>
               </a>
               <a href="userOrderHistory.php" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Orders</a>
            </div>
         </nav>
      </div>
   </div>
   <!-- Navbar end -->

   <!-- Modal Search Start -->
   <!-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
   </div> -->
   <!-- Modal Search End -->

   <!-- Hero Start -->
   <div class="container-fluid bg-light py-6 my-6 mt-0">
      <div class="container text-center animated bounceInDown">
         <h1 class="display-1 mb-4">Add to cart</h1>
         <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Menu</li>
         </ol>
      </div>
   </div>
   <!-- Hero End -->

<!-- Checkout Start -->
<div class="container py-5">
   <h1 class="text-center mb-5 text-primary fw-bold">Checkout</h1>

   <!-- Order Summary -->
   <div class="mb-5">
      <h4 class="fw-bold text-primary mb-4">Order Summary</h4>
      <?php if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
         <div class="table-responsive">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Product</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <th>Total</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($_SESSION['cart'] as $item): ?>
                     <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>₹<?php echo number_format($item['price'], 2); ?></td>
                        <td>₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
         <h5 class="fw-bold text-end">Total Price: ₹<?php echo number_format($totalPrice, 2); ?></h5>
      <?php else: ?>
         <p class="text-center text-danger">Your cart is empty.</p>
      <?php endif; ?>
   </div>

   <!-- Display Errors -->
   <?php if (!empty($error)): ?>
      <div class="alert alert-danger text-center"><?php echo $error; ?></div>
   <?php endif; ?>

   <!-- Checkout Form -->
   <form action="checkout.php" method="POST" class="bg-light p-4 rounded shadow-sm">
      <h4 class="text-primary mb-4">Shipping Address</h4>
      
      <!-- Address Fields -->
      <div class="row mb-3">
         <div class="col-md-6">
            <label for="house_no" class="form-label">House No</label>
            <input type="text" name="house_no" id="house_no" class="form-control" required>
         </div>
         <div class="col-md-6">
            <label for="street_name" class="form-label">Street Name</label>
            <input type="text" name="street_name" id="street_name" class="form-control" required>
         </div>
      </div>
      <div class="row mb-3">
         <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" id="city" class="form-control" required>
         </div>
         <div class="col-md-6">
            <label for="district" class="form-label">District</label>
            <input type="text" name="district" id="district" class="form-control" required>
         </div>
      </div>
      <div class="row mb-3">
         <div class="col-md-6">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" id="state" class="form-control" required>
         </div>
         <div class="col-md-6">
            <label for="pincode" class="form-label">Pincode</label>
            <input type="text" name="pincode" id="pincode" class="form-control" required>
         </div>
      </div>

      <h4 class="text-primary mb-4">Payment Method</h4>
      <div class="mb-3">
         <label for="payment_method" class="form-label">Select Payment Method</label>
         <select name="payment_method" id="payment_method" class="form-select" required>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Net Banking">Net Banking</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
         </select>
      </div>

      <!-- Place Order Button -->
      <div class="text-center mt-4">
         <button type="submit" class="btn btn-primary btn-lg px-5">Place Order</button>
      </div>
   </form>
</div>
<!-- Checkout End -->



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

   <!-- Back to Top -->
   <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

   <!-- JavaScript Libraries -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="lib/wow/wow.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/waypoints/waypoints.min.js"></script>
   <script src="lib/counterup/counterup.min.js"></script>
   <script src="lib/lightbox/js/lightbox.min.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Template Javascript -->
   <script src="js/main.js"></script>
</body>

</html>