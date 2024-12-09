<?php
// Start session
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: adminLogin.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Craft Loving | Admin Home</title>
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

<div class="container-fluid d-flex">
      <!-- Vertical Navbar Start -->
      <nav class="navbar navbar-light bg-light flex-column align-items-start p-3 vh-100" style="width: 250px;">
      
         <a href="index.html" class="navbar-brand mb-4">
         <img src="img/logo1.png" style="height: 10vh; ">
            <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark"> Loving</span></h1>
         </a>
         <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link">Home</a>
            <a href="adminDeleteProduct.php" class="nav-item nav-link">Remove Products</a>
            <a href="adminInsertProduct.php" class="nav-item nav-link">Add Products</a>
            <a href="#" class="nav-item nav-link">Product Sale</a>
            <a href="#" class="nav-item nav-link">Count of Customer</a>
            <a href="adminOrderVerification.php" class="nav-item nav-link">Order Verification</a>
            <!-- <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tasks</a>
               <div class="dropdown-menu bg-light">
                  <a href="adminDeleteProduct.php" class="dropdown-item">Remove Product</a>
                  <a href="adminInsertProduct.php" class="dropdown-item">Add Products</a>
               </div>
            </div>
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Reports</a>
               <div class="dropdown-menu bg-light">
                  <a href="team.html" class="dropdown-item">Product Sale</a>
                  <a href="testimonial.html" class="dropdown-item">Count of Customer</a>
               </div>
            </div> -->
         </div>
         <div class="mt-auto w-100">
            <a href="logout.php" class="btn btn-primary py-2 px-5 rounded-pill">Logout</a>
         </div>
      </nav>

      <!-- About start -->
      <div class="container-fluid py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                        <img src="img/image11.jpg" class="img-fluid rounded"
                            alt>
                    </div>
                    <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About
                            Us</small>
                        <h1 class="display-5 mb-4">Trusted By 200 + satisfied
                            clients</h1>
                        <p class="mb-4">Discover a world of creativity and
                            craftsmanship! From handmade treasures to unique
                            artisanal creations, we bring you the finest
                            collection of crafts made with passion and care.
                            Explore our carefully curated selection to find the
                            perfect addition to your home, a thoughtful gift, or
                            an inspiring piece to cherish. Celebrate the
                            artistry of craft makers and shop with confidence
                            for something truly special.</p>
                        <div class="row g-4 text-dark mb-5">
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>Home
                                Delivery
                            </div>
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>24/7
                                Customer Support
                            </div>
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>Easy
                                Customization Options
                            </div>
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>Shop
                                Unique Crafts
                            </div>
                        </div>
                        <a href="about.html"
                            class="btn btn-primary py-3 px-5 rounded-pill">About
                            Us<i class="fas fa-arrow-right ps-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <!-- About  End -->



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

   <!-- Template Javascript -->
   <script src="js/main.js"></script>
</body>

</html>