<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update if needed
$password = ""; // Update if needed
$dbname = "craft"; // Update to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your message has been successfully sent!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('An error occurred. Please try again.'); window.location.href='index.html';</script>";
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Craft Loving | Contact Us</title>
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
   <div id="spinner"
      class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
   </div>
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
               <a href="addCart.php"
                  class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"><i
                     class="fas fa-shopping-cart"></i></a>
               <a href="wishlist.php" class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex">
                  <i class="fas fa-heart"></i>
               </a>
               <a href="userPlaceOrder.php"
                  class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Order
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
         <h1 class="display-1 mb-4">Contact</h1>
         <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
         </ol>
      </div>
   </div>
   <!-- Hero End -->
   <!-- Contact Start -->
   <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
      <div class="container">
         <div class="p-5 bg-light rounded contact-form">
            <div class="row g-4">
               <div class="col-12">
                  <small
                     class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Get
                     in touch</small>
                  <h1 class="display-5 mb-0">Contact Us For Any Queries!</h1>
               </div>
               <div class="col-md-6 col-lg-7">
                  <p class="mb-4">Have questions or need assistance? Fill out the form below, and we'll get back to you
                     shortly!</p>
                  <!-- Contact Form -->
                  <form action="contact.php" method="POST">
                     <!-- Name -->
                     <input type="text" name="name" class="w-100 form-control p-3 mb-4 border-primary bg-light"
                        placeholder="Your Name" required>

                     <!-- Email -->
                     <input type="email" name="email" class="w-100 form-control p-3 mb-4 border-primary bg-light"
                        placeholder="Enter Your Email" required>

                     <!-- Subject -->
                     <input type="text" name="subject" class="w-100 form-control p-3 mb-4 border-primary bg-light"
                        placeholder="Subject" required>

                     <!-- Message -->
                     <textarea name="message" class="w-100 form-control mb-4 p-3 border-primary bg-light" rows="4"
                        cols="10" placeholder="Your Message" required></textarea>

                     <!-- Submit Button -->
                     <button class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill"
                        type="submit">Submit Now</button>
                  </form>
               </div>
               <div class="col-md-6 col-lg-5">
                  <div>
                     <!-- Address -->
                     <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                           <h4>Address</h4>
                           <p>123 Street, New York, USA</p>
                        </div>
                     </div>
                     <!-- Mail Us -->
                     <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                           <h4>Mail Us</h4>
                           <p class="mb-2">info@example.com</p>
                           <p class="mb-0">support@example.com</p>
                        </div>
                     </div>
                     <!-- Telephone -->
                     <div class="d-inline-flex w-100 border border-primary p-4 rounded">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                           <h4>Telephone</h4>
                           <p class="mb-2">(+012) 3456 7890 123</p>
                           <p class="mb-0">(+704) 5555 0127 296</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Contact End -->


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