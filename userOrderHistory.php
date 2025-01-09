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

// Fetch the order history for the logged-in user
$orderQuery = "SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC"; // Fetch orders in reverse chronological order
$orderStmt = $conn->prepare($orderQuery);

// Check if the prepare was successful
if (!$orderStmt) {
    die("Prepare failed: " . $conn->error); // Output error if prepare fails
}

$orderStmt->bind_param('i', $user_id);
$orderStmt->execute();
$orderResult = $orderStmt->get_result();

// Check if the user has any orders
if ($orderResult->num_rows === 0) {
    $noOrdersMessage = "You have not placed any orders yet.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Craft Loving | User Order History </title>
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

    <!-- History Start -->
    <div class="container py-5">
        <h1 class="text-center mb-5">Your Order History</h1>

        <!-- Check if user has orders -->
        <?php if (isset($noOrdersMessage)): ?>
            <div class="alert alert-info text-center"><?php echo $noOrdersMessage; ?></div>
        <?php else: ?>
            <div class="row">
                <?php while ($order = $orderResult->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-light rounded p-3">
                            <h5 class="card-title">Order #<?php echo $order['id']; ?> <span
                                    class="badge bg-<?php echo ($order['status'] === 'completed') ? 'success' : 'warning'; ?>"><?php echo ucfirst($order['status']); ?></span>
                            </h5>
                            <p><strong>Order Date:</strong> <?php echo date("d-m-Y", strtotime($order['created_at'])); ?></p>
                            <p><strong>Total Price:</strong> ₹<?php echo number_format($order['total_price'], 2); ?></p>
                            <p><strong>Payment Method:</strong> <?php echo $order['payment_method']; ?></p>
                            <p><strong>Shipping Address:</strong> <?php echo $order['address']; ?></p>

                            <!-- Link to view order details -->
                            <a href="success.php?order_id=<?php echo $order['id']; ?>" class="btn btn-primary btn-sm mb-2">View
                                Details</a>

                            <!-- Display the order items -->
                            <?php
                            $itemQuery = "SELECT oi.*, p.name FROM order_items oi
                                      JOIN products p ON oi.product_id = p.id 
                                      WHERE oi.order_id = ?";
                            $itemStmt = $conn->prepare($itemQuery);

                            if (!$itemStmt) {
                                die("Prepare failed: " . $conn->error);
                            }

                            $itemStmt->bind_param('i', $order['id']);
                            $itemStmt->execute();
                            $itemResult = $itemStmt->get_result();
                            ?>

                            <div class="mt-3">
                                <strong>Items Purchased:</strong>
                                <ul class="list-unstyled">
                                    <?php while ($item = $itemResult->fetch_assoc()): ?>
                                        <li class="d-flex justify-content-between">
                                            <span><?php echo $item['name']; ?> (x<?php echo $item['quantity']; ?>)</span>
                                            <span>₹<?php echo number_format($item['total_price'], 2); ?></span>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <!-- Go back to shopping -->
        <div class="mt-4 text-center">
            <a href="index.php" class="btn btn-secondary btn-lg rounded-pill">Back to Shopping</a>
        </div>
    </div>
    <!-- History End -->



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
                                <img src="img/image08.jpg" class="img-fluid rounded-circle border border-primary p-2"
                                    alt>
                            </div>
                            <div class="col-4">
                                <img src="img/image12.jpg" class="img-fluid rounded-circle border border-primary p-2"
                                    alt>
                            </div>
                            <div class="col-4">
                                <img src="img/image13.jpg" class="img-fluid rounded-circle border border-primary p-2"
                                    alt>
                            </div>
                            <div class="col-4">
                                <img src="img/image09.jpg" class="img-fluid rounded-circle border border-primary p-2"
                                    alt>
                            </div>
                            <div class="col-4">
                                <img src="img/image5.jpg" class="img-fluid rounded-circle border border-primary p-2"
                                    alt>
                            </div>
                            <div class="col-4">
                                <img src="img/image06.jpg" class="img-fluid rounded-circle border border-primary p-2"
                                    alt>
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