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

// Handle adding items to the wishlist
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Initialize wishlist session if not already set
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }

    // Add product to wishlist if not already in it
    if (!in_array($product_id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $product_id;
    }

    header("Location: wishlist.php"); // Redirect back to wishlist display
    exit();
}

// Fetch wishlist items from the database
$wishlist = $_SESSION['wishlist'] ?? [];
$products = [];
if (!empty($wishlist)) {
    $product_ids = implode(",", $wishlist);
    $sql = "SELECT id, name, image, price FROM products WHERE id IN ($product_ids)";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
}

// Handle removing items from the wishlist
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    $_SESSION['wishlist'] = array_diff($_SESSION['wishlist'], [$remove_id]);
    header("Location: wishlist.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Craft Loving | Wishlist</title>
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
               <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                  data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
               <a href="addCart.php"
                  class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"><i
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

   <!-- Whishlist start -->
   <div class="container py-5">
      <h1 class="text-center mb-4">Your Wishlist</h1>

      <?php if (!empty($products)): ?>
      <div class="row">
         <?php foreach ($products as $product): ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
            <img src="<?php echo $product['image']; ?>" class="card-img-top rounded-top product-image img-fluid"
            alt="<?php echo $product['name']; ?>">
               <div class="card-body">
                  <h5 class="card-title"><?php echo $product['name']; ?></h5>
                  <p class="fw-bold text-primary">Price: $<?php echo $product['price']; ?></p>
                  <a href="wishlist.php?remove_id=<?php echo $product['id']; ?>" class="btn btn-primary">Remove</a>
               </div>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
      <?php else: ?>
      <h3 class="text-center text-muted">Your wishlist is empty!</h3>
      <?php endif; ?>

      <div class="text-center mt-4">
         <a href="product.php" class="btn btn-primary">Continue Browsing</a>
      </div>
   </div>
   <!-- Whishlist end-->

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