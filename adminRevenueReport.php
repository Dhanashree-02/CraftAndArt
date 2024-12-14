<?php
// Database connection
$servername = "localhost";  // your MySQL server
$username = "root";         // your MySQL username
$password = "";             // your MySQL password
$dbname = "craft";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate total revenue for completed orders
function getRevenueForCompletedOrders($conn, $period) {
    $dateCondition = "o.status = 'completed'";  // Filter for completed orders
    
    if ($period == "daily") {
        // Today's completed orders
        $dateCondition .= " AND DATE(o.created_at) = CURDATE()";
    } elseif ($period == "weekly") {
        // This week's completed orders
        $dateCondition .= " AND YEARWEEK(o.created_at, 1) = YEARWEEK(CURDATE(), 1)";
    } elseif ($period == "monthly") {
        // This month's completed orders
        $dateCondition .= " AND MONTH(o.created_at) = MONTH(CURDATE()) AND YEAR(o.created_at) = YEAR(CURDATE())";
    }
    
    // SQL Query to calculate the total revenue for completed orders
    $sql = "
        SELECT SUM(o.total_price) AS total_revenue
        FROM orders o
        WHERE $dateCondition
    ";

    $result = $conn->query($sql);
    $revenue = 0;

    // Fetch the result
    if ($row = $result->fetch_assoc()) {
        $revenue = $row['total_revenue'];
    }

    // Return the revenue for completed orders
    return $revenue;
}

// Get the revenue for completed orders for daily, weekly, and monthly periods
$dailyRevenue = getRevenueForCompletedOrders($conn, "daily");
$weeklyRevenue = getRevenueForCompletedOrders($conn, "weekly");
$monthlyRevenue = getRevenueForCompletedOrders($conn, "monthly");

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Craft Loving | Admin Revenue Generation</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
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

   <div class="container-fluid d-flex">
      <!-- Vertical Navbar Start -->
      <nav class="navbar navbar-light bg-light flex-column align-items-center justify-content-center p-3 vh-100"
         style="width: 250px;">
         <a href="index.php" class="navbar-brand mb-4 text-center">
            <img src="img/logo1.png" style="height: 10vh;">
            <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark"> Loving</span></h1>
         </a>
         <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="adminDeleteProduct.php" class="nav-item nav-link">Remove Products</a>
            <a href="adminInsertProduct.php" class="nav-item nav-link">Add Products</a>
            <a href="adminRevenueReport.php" class="nav-item nav-link">Product Sale</a>
            <a href="adminCustomerCount.php" class="nav-item nav-link">Count of Customer</a>
            <a href="adminOrderVerification.php" class="nav-item nav-link">Order Verification</a>
         </div>
         <div class="mt-auto w-100">
            <a href="logout.php" class="btn btn-primary py-2 px-5 rounded-pill">Logout</a>
         </div>
      </nav>
<!-- Revenue start -->
<div class="container mt-5 pt-5">
    <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
            Revenue Report
        </small>
        <h1 class="display-5 mb-5 text-dark">Revenues generated for Completed Orders</h1>
    </div>

    <!-- Daily Revenue for Completed Orders -->
    <div class="report-section mb-5 p-4 border rounded shadow-sm" style="max-width: 700px; margin: 0 auto;">
        <h2 class="text-center text-primary">Daily Revenue <span class="text-dark"> (Completed Orders)</span> </h2>
        <p class="text-center text-dark">Total revenue for completed orders today:</p>
        <p class="amount text-center display-4">₹<?php echo number_format($dailyRevenue, 2); ?></p>
    </div>

    <!-- Weekly Revenue for Completed Orders -->
    <div class="report-section mb-5 p-4 border rounded shadow-sm" style="max-width: 700px; margin: 0 auto;">
        <h2 class="text-center text-primary">Weekly Revenue <span class="text-dark"> (Completed Orders)</span> </h2>
        <p class="text-center text-dark">Total revenue for completed orders this week:</p>
        <p class="amount text-center display-4">₹<?php echo number_format($weeklyRevenue, 2); ?></p>
    </div>

    <!-- Monthly Revenue for Completed Orders -->
    <div class="report-section mb-5 p-4 border rounded shadow-sm" style="max-width: 700px; margin: 0 auto;">
        <h2 class="text-center text-primary">Monthly Revenue <span class="text-dark"> (Completed Orders)</span> </h2>
        <p class="text-center text-dark">Total revenue for completed orders this month:</p>
        <p class="amount text-center display-4">₹<?php echo number_format($monthlyRevenue, 2); ?></p>
    </div>
</div>
<!-- Revenue end -->



   </div>
   <!-- Vertical Navbar End -->

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


   <!-- JavaScript Libraries -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="lib/wow/wow.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/waypoints/waypoints.min.js"></script>
   <script src="lib/counterup/counterup.min.js"></script>
   <script src="lib/lightbox/js/lightbox.min.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
   <!-- Template Javascript -->
   <script src="js/main.js"></script>
</body>
</html>