<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "craft"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Fetch products from database
$sql = "SELECT id, name, image, description, price FROM products";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Craft Loving | Products </title>
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
         <h1 class="display-1 mb-4">Products</h1>
         <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Menu</li>
         </ol>
      </div>
   </div>
   <!-- Hero End -->


   <!-- Product Start -->
   <div class="container py-5">
      <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
         <small
            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
            Our Products
         </small>
         <h1 class="display-5 mb-5">Discover the World’s Most Loved Crafts</h1>
      </div>
      <div class="row">
         <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
               <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                     <div class="position-relative overflow-hidden">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top rounded-top product-image"
                           alt="<?php echo $row['name']; ?>" style="transition: transform 0.3s;">
                        <a href="wishlist.php?id=<?php echo $row['id']; ?>"
                           class="btn <?php echo $is_in_wishlist ? 'btn-danger' : 'btn-outline-danger'; ?> position-absolute top-0 end-0 m-3 rounded-circle wishlist-btn">
                           <i class="fas fa-heart" style="transition: transform 0.3s;"></i>
                        </a>
                     </div>
                     <div class="card-body text-center p-4">
                        <h5 class="card-title text-dark fw-bold mb-3" style="font-size: 1.2rem;"><?php echo $row['name']; ?>
                        </h5>
                        <p class="card-text text-muted mb-3" style="font-size: 0.9rem; line-height: 1.4;">
                           <?php echo $row['description']; ?></p>
                        <p class="fw-bold text-primary mb-4" style="font-size: 1.1rem;">Price: $<?php echo $row['price']; ?>
                        </p>
                        <a href="addCart.php?id=<?php echo $row['id']; ?>"
                           class="btn btn-primary px-4 py-2 rounded-pill shadow-sm add-cart-btn"
                           style="transition: transform 0.3s;">
                           Add to Cart
                        </a>

                        <!-- Share Button -->
                        <div class="share-container mt-3">
                           <button class="btn btn-outline-primary share-btn" style="transition: background-color 0.3s;">
                              <i class="fas fa-share-alt"></i> Share
                           </button>

                           <!-- Hidden Share Options -->
                           <div class="share-options mt-2" style="display: none;">
                              <a href="https://wa.me/?text=<?php echo urlencode('Check out this amazing product: ' . $row['name'] . ' ' . $row['description'] . ' ' . 'https://yourwebsite.com/product.php?id=' . $row['id']); ?>"
                                 target="_blank" class="btn btn-success btn-sm mb-2">
                                 <i class="fab fa-whatsapp"></i> WhatsApp
                              </a>
                              <a href="https://www.instagram.com/share?url=<?php echo urlencode('https://yourwebsite.com/product.php?id=' . $row['id']); ?>"
                                 target="_blank" class="btn btn-info btn-sm mb-2">
                                 <i class="fab fa-instagram"></i> Instagram
                              </a>
                              <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo urlencode('https://yourwebsite.com/product.php?id=' . $row['id']); ?>&media=<?php echo urlencode($row['image']); ?>&description=<?php echo urlencode($row['description']); ?>"
                                 target="_blank" class="btn btn-danger btn-sm mb-2">
                                 <i class="fab fa-pinterest"></i> Pinterest
                              </a>
                              <button class="btn btn-secondary btn-sm mb-2" id="copyLinkBtn">
                                 <i class="fas fa-link"></i> Copy Link
                              </button>
                           </div>
                        </div>
                        <!-- End Share Button -->
                     </div>
                  </div>
               </div>
            <?php endwhile; ?>
         <?php else: ?>
            <p class="text-center text-muted">No products available.</p>
         <?php endif; ?>
      </div>
   </div>
   <!-- Product End -->

   <script>
      // Toggle share options visibility
      document.querySelectorAll('.share-btn').forEach(button => {
         button.addEventListener('click', function () {
            const options = this.nextElementSibling;
            options.style.display = options.style.display === 'none' || options.style.display === '' ? 'block' : 'none';
         });
      });

      // Copy link functionality
      document.getElementById('copyLinkBtn')?.addEventListener('click', function () {
         const productUrl = window.location.href;
         navigator.clipboard.writeText(productUrl).then(() => {
            alert('Link copied to clipboard!');
         });
      });

      // Hover Effect for Product Image
      const productImages = document.querySelectorAll('.product-image');
      productImages.forEach(image => {
         image.addEventListener('mouseenter', () => {
            image.style.transform = 'scale(1.05)';
         });
         image.addEventListener('mouseleave', () => {
            image.style.transform = 'scale(1)';
         });
      });

      // Hover Effect for Wishlist Icon
      const wishlistIcons = document.querySelectorAll('.wishlist-btn i');
      wishlistIcons.forEach(icon => {
         icon.addEventListener('mouseenter', () => {
            icon.style.transform = 'scale(1.2)';
         });
         icon.addEventListener('mouseleave', () => {
            icon.style.transform = 'scale(1)';
         });
      });
   </script>


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