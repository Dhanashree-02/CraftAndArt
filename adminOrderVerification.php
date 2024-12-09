<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "craft";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update order status if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['order_status'])) {
    $order_id = intval($_POST['order_id']);
    $order_status = $_POST['order_status'];

    // Update order status query
    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE id = ?");
    $stmt->bind_param("si", $order_status, $order_id);
    
    if ($stmt->execute()) {
        // Fetch user's email to notify them
        $query = "SELECT users.email, products.name 
                  FROM orders 
                  JOIN users ON orders.user_id = users.id 
                  JOIN products ON orders.product_id = products.id 
                  WHERE orders.id = ?";
        $user_stmt = $conn->prepare($query);
        $user_stmt->bind_param("i", $order_id);
        $user_stmt->execute();
        $result = $user_stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // $user_email = $user['email'];
            // $product_name = $user['name'];
            
            // // Notify the user via email
            // $subject = "Order Update - Craft Loving";
            // $message = "
            //     Hi there,

            //     Your order for product '{$product_name}' has been updated to '{$order_status}'.

            //     Thank you for shopping with us!

            //     Best Regards,
            //     Craft Loving Team
            // ";
            // $headers = "From: noreply@craftloving.com";

            // mail($user_email, $subject, $message, $headers);
        }
        
        echo "<script>alert('Order status updated successfully!');</script>";
    } else {
        echo "<script>alert('Failed to update order status.');</script>";
    }

    $stmt->close();
}

// Fetch all orders
$query = "SELECT orders.id, products.name AS product_name, orders.quantity, orders.order_status, orders.created_at 
          FROM orders 
          JOIN products ON orders.product_id = products.id 
          ORDER BY orders.created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="utf-8">
   <title>Craft Loving | Remove Product</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
   <div class="container-fluid d-flex">
      <!-- Vertical Navbar Start -->
      <nav class="navbar navbar-light bg-light flex-column align-items-start p-3 vh-100" style="width: 250px;">
         <a href="index.html" class="navbar-brand mb-4">
            <h1 class="text-primary fw-bold mb-0">Craft<span class="text-dark">Loving</span></h1>
         </a>
         <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link">Home</a>
            <a href="adminDeleteProduct.php" class="nav-item nav-link active">Remove Products</a>
            <a href="adminInsertProduct.php" class="nav-item nav-link">Add Products</a>
            <a href="#" class="nav-item nav-link">Product Sale</a>
            <a href="#" class="nav-item nav-link">Count of Customer</a>
         </div>
         <div class="mt-auto w-100">
            <a href="logout.php" class="btn btn-primary py-2 px-5 rounded-pill">Logout</a>
         </div>
      </nav>

      <!-- Order Verification start -->
      <div class="container mt-5">
         <h2 class="text-center mb-4">Admin - Order Verification</h2>

         <?php if ($result->num_rows > 0): ?>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Order ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Order Status</th>
                  <th>Created At</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php while ($order = $result->fetch_assoc()): ?>
               <tr>
                  <td><?php echo $order['id']; ?></td>
                  <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                  <td><?php echo $order['quantity']; ?></td>
                  <td><?php echo $order['order_status']; ?></td>
                  <td><?php echo date('F j, Y, g:i A', strtotime($order['created_at'])); ?></td>
                  <td>
                     <form method="POST" action="">
                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                        <select name="order_status" class="form-select">
                           <option value="pending" <?php echo $order['order_status'] == 'pending' ? 'selected' : ''; ?>>
                              Pending</option>
                           <option value="approved"
                              <?php echo $order['order_status'] == 'approved' ? 'selected' : ''; ?>>Approved</option>
                           <option value="rejected"
                              <?php echo $order['order_status'] == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                     </form>
                  </td>
               </tr>
               <?php endwhile; ?>
            </tbody>
         </table>
         <?php else: ?>
         <p class="text-center">No orders found.</p>
         <?php endif; ?>

         <a href="adminDashboard.php" class="btn btn-primary mt-3">Back to Dashboard</a>
      </div>
      <!-- Verification end -->
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
   <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $conn->close(); ?>