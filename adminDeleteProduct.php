<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "craft"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a product ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = intval($_POST['productID']); // Secure input with intval to prevent SQL injection risks

    // Check if the product exists in the database
    $checkQuery = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the product record from the database
        $deleteQuery = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $productID);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Product deleted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting product: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Product not found.</div>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Craft Loving | Remove Product</title>
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

<body>
   <div class="container-fluid d-flex">
      <!-- Vertical Navbar Start -->
      <nav class="navbar navbar-light bg-light flex-column align-items-start p-3 vh-100" style="width: 250px;">
         <a href="index.php" class="navbar-brand mb-4">
            <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark">Loving</span></h1>
         </a>
         <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="adminDeleteProduct.php" class="nav-item nav-link active">Remove Products</a>
            <a href="adminInsertProduct.php" class="nav-item nav-link">Add Products</a>
            <a href="#" class="nav-item nav-link">Product Sale</a>
            <a href="#" class="nav-item nav-link">Count of Customer</a>
         </div>
         <div class="mt-auto w-100">
            <a href="logout.php" class="btn btn-primary py-2 px-5 rounded-pill">Logout</a>
         </div>
      </nav>

      <!-- Remove product start -->
      <div class="container py-5">
         <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
               class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
               Remove Product
            </small>
            <h1 class="display-5 mb-5 text-dark">Enter Product Details to Remove</h1>
         </div>
         <div class="card shadow-lg rounded-3 mx-auto" style="max-width: 500px;">
            <div class="card-body p-5">
               <form action="adminDeleteProduct.php" method="POST">
                  <div class="mb-4">
                     <label for="productID" class="form-label text-dark fs-5">Product ID:</label>
                     <input type="number" class="form-control form-control-lg" id="productID" name="productID" required>
                  </div>
                  <div class="text-center mt-4">
                     <button type="submit" class="btn btn-primary btn-lg py-2 px-5 rounded-pill shadow-sm">Delete
                        Product</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Remove product end -->
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