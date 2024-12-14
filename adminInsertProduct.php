<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "craft";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category']; // New Category field

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imagePath = 'img/' . basename($imageName);  // Define where to store the image

        // Move uploaded file to the "uploads" folder
        if (move_uploaded_file($imageTmp, $imagePath)) {
            // Insert product data into the database
            $sql = "INSERT INTO products (name, description, price, category, image) 
                    VALUES ('$name', '$description', '$price', '$category', '$imagePath')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>New product added successfully!</div>";

                // JavaScript to reset the form fields
                echo "<script>document.getElementById('name').value = '';</script>";
                echo "<script>document.getElementById('description').value = '';</script>";
                echo "<script>document.getElementById('price').value = '';</script>";
                echo "<script>document.getElementById('category').value = '';</script>";
                echo "<script>document.getElementById('image').value = '';</script>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error uploading image.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>No image file uploaded or there was an upload error.</div>";
    }
}

$conn->close();
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
</head>

<body>

   <div class="container-fluid d-flex">
      <!-- Vertical Navbar Start -->
     <!-- Vertical Navbar Start -->
<nav class="navbar navbar-light bg-light flex-column align-items-start p-3 vh-100" 
     style="width: 250px; position: sticky; top: 0; z-index: 1000;">
   <a href="index.php" class="navbar-brand mb-4">
      <img src="img/logo1.png" style="height: 10vh;">
      <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark"> Loving</span></h1>
   </a>
   <div class="navbar-nav w-100">
      <a href="index.php" class="nav-item nav-link">Home</a>
      <a href="adminDeleteProduct.php" class="nav-item nav-link">Remove Products</a>
      <a href="adminInsertProduct.php" class="nav-item nav-link">Add Products</a>
      <a href="#" class="nav-item nav-link">Product Sale</a>
      <a href="#" class="nav-item nav-link">Count of Customer</a>
      <a href="adminOrderVerification.php" class="nav-item nav-link">Order Verification</a>
   </div>
   <div class="mt-auto w-100">
      <a href="logout.php" class="btn btn-primary py-2 px-5 rounded-pill">Logout</a>
   </div>
</nav>


      <!-- Admin insertion start -->
      <div class="container py-5">
   <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
      <small
         class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
         Add Product
      </small>
      <h1 class="display-5 mb-5 text-dark">Enter the Details of the New Product You Wish to Add</h1>
   </div>
   <div class="card shadow-lg rounded-3 mx-auto" style="max-width: 700px;">
      <div class="card-body p-5">
         <form action="adminInsertProduct.php" method="POST" enctype="multipart/form-data">
            <!-- Product Name -->
            <div class="mb-4">
               <label for="name" class="form-label text-dark fs-5">Product Name:</label>
               <input type="text" class="form-control form-control-lg" id="name" name="name" required>
            </div>

            <!-- Product Description -->
            <div class="mb-4">
               <label for="description" class="form-label text-dark fs-5">Product Description:</label>
               <textarea id="description" name="description" class="form-control form-control-lg" rows="4" required></textarea>
            </div>

            <!-- Price -->
            <div class="mb-4">
               <label for="price" class="form-label text-dark fs-5">Price ($):</label>
               <input type="number" class="form-control form-control-lg" id="price" name="price" required>
            </div>

            <!-- Category Dropdown -->
            <div class="mb-4">
               <label for="category" class="form-label text-dark fs-5">Category:</label>
               <select class="form-select form-select-lg" id="category" name="category" required>
                  <option value="" disabled selected>Select a Category</option>
                  <option value="WoodCraft">WoodCraft</option>
                  <option value="Mandala">Mandala</option>
                  <option value="ResinArt">ResinArt</option>
                  <option value="PaperCraft">PaperCraft</option>
                  <option value="Miniature">Miniature</option>
               </select>
            </div>

            <!-- Product Image -->
            <div class="mb-4">
               <label for="image" class="form-label text-dark fs-5">Product Image:</label>
               <input type="file" class="form-control form-control-lg" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
               <button type="submit" class="btn btn-primary btn-lg py-2 px-4 rounded-pill shadow-sm">Add Product</button>
            </div>
         </form>
      </div>
   </div>
</div>

      <!-- Admin insertion end -->
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