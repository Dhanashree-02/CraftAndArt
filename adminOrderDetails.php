<?php
// Admin login check
session_start();
if (!isset($_SESSION['admin_id'])) {
   header("Location: adminLogin.php");
   exit();
}

// Database connection
include('db_connection.php');

if (!isset($_GET['order_id'])) {
   echo "Order ID not provided.";
   exit();
}

$order_id = $_GET['order_id'];

// Fetch order details
$stmt = $conn->prepare("
    SELECT o.id, u.name AS user_name, o.total_price, o.status, o.created_at
    FROM orders o
    JOIN users u ON o.user_id = u.id
    WHERE o.id = ?
");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order_result = $stmt->get_result();
$order = $order_result->fetch_assoc();

if (!$order) {
   echo "Order not found.";
   exit();
}

// Fetch order items
$stmt = $conn->prepare("
    SELECT p.name AS product_name, oi.quantity, oi.price
    FROM order_items oi
    JOIN products p ON oi.product_id = p.id
    WHERE oi.order_id = ?
");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$items_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Craft Loving | Add Products</title>
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

   <style>
      /* Ensure the body takes full height and pushes footer down */
      body {
         display: flex;
         flex-direction: column;
         min-height: 100vh;
      }

      .container-fluid {
         flex: 1;
         display: flex;
      }

      .footer {
         background-color: #f8f9fa;
         padding: 30px;
      }
   </style>
</head>

<body>

   <div class="container-fluid d-flex">
      <!-- Vertical Navbar Start -->
      <nav class="navbar navbar-light bg-light flex-column align-items-start p-3 vh-100" style="width: 250px;">
         <a href="index.php" class="navbar-brand mb-4">
            <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark"> Loving</span></h1>
         </a>
         <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="adminDeleteProduct.php" class="nav-item nav-link">Remove Products</a>
            <a href="adminInsertProduct.php" class="nav-item nav-link">Add Products</a>
            <a href="#" class="nav-item nav-link">Product Sale</a>
            <a href="#" class="nav-item nav-link">Count of Customer</a>
         </div>
         <div class="mt-auto w-100">
            <a href="logout.php" class="btn btn-primary py-2 px-5 rounded-pill">Logout</a>
         </div>
      </nav>
      <!-- Vertical Navbar End -->

      <!-- Admin order details start -->
      <div class="container my-5 d-flex justify-content-center">
         <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
               class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
               Admin view order details
            </small>
            <h1 class="display-5 mb-5 text-dark">Enter the Details of the New Product You Wish to Add</h1>
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="card shadow-sm p-4 mb-4">
                     <h4 class="card-title text-center">Order Information</h4>
                     <p><strong>Order ID:</strong> <?php echo $order['id']; ?></p>
                     <p><strong>User:</strong> <?php echo $order['user_name']; ?></p>
                     <p><strong>Total Price:</strong> ₹<?php echo number_format($order['total_price'], 2); ?></p>
                     <p><strong>Status:</strong>
                        <span
                           class="badge 
                        <?php echo ($order['status'] == 'pending') ? 'bg-warning' : (($order['status'] == 'confirmed') ? 'bg-success' : 'bg-danger'); ?>">
                           <?php echo ucfirst($order['status']); ?>
                        </span>
                     </p>
                     <p><strong>Order Placed on:</strong>
                        <?php echo date('d M Y, H:i', strtotime($order['created_at'])); ?></p>
                  </div>
               </div>
            </div>

            <div class="text-center mt-4">
               <a href="adminOrderVerification.php" class="btn btn-primary px-4 py-2 rounded-pill">Back to Orders</a>
            </div>
         </div>
      </div>
      <!-- Admin order details end -->
   </div>

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
   <script src="lib/wow/wow.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/waypoints/waypoints.min.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="lib/counterup/counterup.min.js"></script>

   <!-- Contact Javascript File -->
   <script src="js/main.js"></script>

   <!-- Bootstrap Bundle with Popper -->
   <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>