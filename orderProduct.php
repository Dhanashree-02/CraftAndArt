<?php
// Start session to access cart data
session_start();

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    header("Location: product.php");
    exit(); // Redirect to products page if cart is empty
}

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $product) {
    $totalPrice += $product['price'] * $product['quantity'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $house_no = $_POST['house_no'];
    $street_name = $_POST['street_name'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $payment_method = $_POST['payment_method'];
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in, get their user_id

    // Combine all address fields into one
    $address = $house_no . ', ' . $street_name . ', ' . $city . ', ' . $district . ', ' . $state . ' - ' . $pincode;

    // Database connection
    include('db_connection.php'); // Make sure you have your DB connection here

    // Insert the order into the 'orders' table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price, status, address, payment_method) VALUES (?, ?, 'pending', ?, ?)");
    if ($stmt === false) {
        die('Error preparing statement: ' . $conn->error); // Handle error
    }
    $stmt->bind_param("idss", $user_id, $totalPrice, $address, $payment_method); // Bind parameters
    if (!$stmt->execute()) {
        die('Error executing statement: ' . $stmt->error); // Handle error
    }
    $order_id = $stmt->insert_id; // Get the last inserted order id

    // Insert each item in the 'order_items' table
    foreach ($_SESSION['cart'] as $product) {
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error); // Handle error
        }
        $stmt->bind_param("iiid", $order_id, $product['id'], $product['quantity'], $product['price']);
        if (!$stmt->execute()) {
            die('Error executing statement: ' . $stmt->error); // Handle error
        }
    }

    // Clear the cart after order placement
    unset($_SESSION['cart']);

    // Redirect to order confirmation page
    header("Location: orderConfirmation.php");
    exit(); // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Craft Loving | Order products </title>
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
            <a href="index.html" class="navbar-brand">
               <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark"> Loving </span></h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarCollapse">
               <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <div class="navbar-nav mx-auto">
                  <a href="index.php" class="nav-item nav-link">Home</a>
                  <a href="service.php" class="nav-item nav-link">Services</a>
                  <a href="product.phpl" class="nav-item nav-link">Products</a>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu bg-light">
                        <a href="team..php" class="dropdown-item">Our Team</a>
                        <a href="testimonial..php" class="dropdown-item">Testimonial</a>
                        <a href="about..php" class="dropdown-item">About us</a>
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
                     <a href="userLogin.php" class="dropdown-item">User Login</a>
                     <a href="adminLogin.php" class="dropdown-item">Admin Login</a>
                  </div>
               </div>
               <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                  data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
               <a href="addCart.php" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"><i
                     class="fas fa-shopping-cart"></i></a>
                     <a href="wishlist.php" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex">
                  <i class="fas fa-heart"></i>
               </a>
               <a href class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Order
                  Now</a>
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

   <!-- Hero Start -->
   <div class="container-fluid bg-light py-6 my-6 mt-0">
      <div class="container text-center animated bounceInDown">
         <h1 class="display-1 mb-4">Your order</h1>
         <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Menu</li>
         </ol>
      </div>
   </div>
   <!-- Hero End -->
<!-- Order start -->
<div class="container-fluid order py-6 wow bounceInUp" data-wow-delay="0.1s">
   <div class="container">
      <div class="p-5 bg-light rounded order-form">
         <div class="row g-4">
            <div class="col-12">
               <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Place an Order</small>
               <h1 class="display-5 mb-0">Proceed Your Order</h1>
            </div>
            <div class="col-md-6 col-lg-7">
               <p class="mb-4">Fill in the details below to place your order. We will process it shortly!</p>
               <!-- Order Form -->
               <form method="POST" action="orderProduct.php">
    <!-- Address -->
    <h3>Address</h3>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="house_no" class="w-100 form-control p-3 mb-4 border-primary bg-light rounded" placeholder="House No." required>
        </div>
        <div class="col-md-6">
            <input type="text" name="street_name" class="w-100 form-control p-3 mb-4 border-primary bg-light rounded" placeholder="Street Name" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="city" class="w-100 form-control p-3 mb-4 border-primary bg-light rounded" placeholder="City" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="district" class="w-100 form-control p-3 mb-4 border-primary bg-light rounded" placeholder="District" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="state" class="w-100 form-control p-3 mb-4 border-primary bg-light rounded" placeholder="State" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="pincode" class="w-100 form-control p-3 mb-4 border-primary bg-light rounded" placeholder="Pincode" required>
        </div>
    </div>

    <!-- Payment Method -->
    <h3>Payment Method</h3>
    <select name="payment_method" class="w-100 form-control p-3 mb-4 border-primary bg-light rounded" required>
        <option value="COD">Cash on Delivery</option>
        <option value="Card">Credit/Debit Card</option>
        <option value="UPI">UPI Payment</option>
    </select>

    <!-- Submit Button -->
    <button type="submit" class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill">Place Order</button>
</form>

            </div>
            <div class="col-md-6 col-lg-5">
               <div>
                  <!-- Contact Information -->
                  <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                     <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                     <div>
                        <h4>Billing Address</h4>
                        <p>Enter your billing address</p>
                     </div>
                  </div>
                  <!-- Contact Us -->
                  <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                     <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                     <div>
                        <h4>Contact Us</h4>
                        <p class="mb-2">info@yourshop.com</p>
                        <p class="mb-0">(+123) 456-7890</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Order end -->

    
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