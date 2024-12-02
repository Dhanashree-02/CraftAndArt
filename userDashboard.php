<?php
// Start session
session_start();

// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Craft Loving | User Home</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content name="keywords">
   <meta content name="description">
   <link rel="icon" href="img/logo.jpg" type="image/x-icon">
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
   <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
   <!-- Spinner End -->

   <!-- Navbar start -->
   <div class="container-fluid nav-bar">
      <div class="container">
         <nav class="navbar navbar-light navbar-expand-lg py-4">
            <a href="index.html" class="navbar-brand">
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
                        <a href="about.html" class="dropdown-item">About us</a>
                        <a href="contact.html" class="dropdown-item">Contact</a>
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
               <a href="addCart.php"
                  class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"><i
                     class="fas fa-shopping-cart"></i></a>
               <a href="wishlist.php" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex">
                  <i class="fas fa-heart"></i>
               </a>
               <a href="userPlaceOrder.php" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Order
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
      <div class="container">
         <div class="row g-5 align-items-center">
            <div class="col-lg-7 col-md-12">
               <small
                  class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Welcome
                  to CraftLoving</small>
               <h1 class="display-1 mb-4 animated bounceInDown"> Shop
                  <span class="text-primary">Custom Creations</span>
                  for Your Perfect Event
               </h1>
               <a href="products.php" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Order
                  Now</a>
               <a href="about.html" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Know
                  More</a>
            </div>
            <div class="col-lg-5 col-md-12">
               <img src="img/Img1.png" class="img-fluid rounded animated zoomIn" alt>
            </div>
         </div>
      </div>
   </div>
   <!-- Hero End -->

   <!-- About Satrt -->
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
   <!-- About End -->

   <!-- Fact Start-->
   <div class="container-fluid faqt py-6">
      <div class="container">
         <div class="row g-4 align-items-center">
            <div class="col-lg-7">
               <div class="row g-4">
                  <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                     <div class="faqt-item bg-primary rounded p-4 text-center">
                        <i class="fas fa-users fa-4x mb-4 text-white"></i>
                        <h1 class="display-4 fw-bold" data-toggle="counter-up">689</h1>
                        <p class="text-dark text-uppercase fw-bold mb-0">Happy
                           Customers</p>
                     </div>
                  </div>
                  <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                     <div class="faqt-item bg-primary rounded p-4 text-center">
                        <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                        <h1 class="display-4 fw-bold" data-toggle="counter-up">107</h1>
                        <p class="text-dark text-uppercase fw-bold mb-0">Expert
                           Chefs</p>
                     </div>
                  </div>
                  <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                     <div class="faqt-item bg-primary rounded p-4 text-center">
                        <i class="fas fa-check fa-4x mb-4 text-white"></i>
                        <h1 class="display-4 fw-bold" data-toggle="counter-up">253</h1>
                        <p class="text-dark text-uppercase fw-bold mb-0">Events
                           Complete</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
               <div class="video">
                  <button type="button" class="btn btn-play" data-bs-toggle="modal"
                     data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                     <span></span>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal Video -->
   <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content rounded-0">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Youtube
                  Video</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!-- 16:9 aspect ratio -->
               <div class="ratio ratio-16x9">
                  <iframe class="embed-responsive-item" src id="video" allowfullscreen allowscriptaccess="always"
                     allow="autoplay"></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Fact End -->

   <!-- Team Start -->
   <div class="container-fluid team py-6">
      <div class="container">
         <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
               class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
               Team</small>
            <h1 class="display-5 mb-5">We have experienced chef
               Team</h1>
         </div>
         <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
               <div class="team-item rounded">
                  <img class="img-fluid rounded-top " src="img/team-1.jpg" alt>
                  <div class="team-content text-center py-3 bg-dark rounded-bottom">
                     <h4 class="text-primary">Henry</h4>
                     <p class="text-white mb-0">Decoration Chef</p>
                  </div>
                  <div class="team-icon d-flex flex-column justify-content-center m-4">
                     <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fas fa-share-alt"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-facebook-f"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-twitter"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-instagram"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.3s">
               <div class="team-item rounded">
                  <img class="img-fluid rounded-top " src="img/team-2.jpg" alt>
                  <div class="team-content text-center py-3 bg-dark rounded-bottom">
                     <h4 class="text-primary">Jemes Born</h4>
                     <p class="text-white mb-0">Executive Chef</p>
                  </div>
                  <div class="team-icon d-flex flex-column justify-content-center m-4">
                     <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fas fa-share-alt"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-facebook-f"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-twitter"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-instagram"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.5s">
               <div class="team-item rounded">
                  <img class="img-fluid rounded-top " src="img/team-3.jpg" alt>
                  <div class="team-content text-center py-3 bg-dark rounded-bottom">
                     <h4 class="text-primary">Martin Hill</h4>
                     <p class="text-white mb-0">Kitchen Porter</p>
                  </div>
                  <div class="team-icon d-flex flex-column justify-content-center m-4">
                     <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fas fa-share-alt"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-facebook-f"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-twitter"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-instagram"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.7s">
               <div class="team-item rounded">
                  <img class="img-fluid rounded-top " src="img/team-4.jpg" alt>
                  <div class="team-content text-center py-3 bg-dark rounded-bottom">
                     <h4 class="text-primary">Adam Smith</h4>
                     <p class="text-white mb-0">Head Chef</p>
                  </div>
                  <div class="team-icon d-flex flex-column justify-content-center m-4">
                     <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fas fa-share-alt"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-facebook-f"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-twitter"></i></a>
                     <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i
                           class="fab fa-instagram"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Team End -->


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