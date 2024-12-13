<?php
// Admin login check
session_start();
if (!isset($_SESSION['admin_id'])) {
   header("Location: adminLogin.php");
   exit();
}

// Database connection
include('db_connection.php');

// Update order status if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
   $order_id = intval($_POST['order_id']); // Ensure valid integer
   $status = $_POST['status']; // Directly from the form

   // Validate the status value
   $valid_statuses = ['pending', 'confirmed', 'rejected'];
   if (in_array($status, $valid_statuses)) {
      $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
      if (!$stmt) {
         die("Prepare failed: " . $conn->error);
      }
      $stmt->bind_param("si", $status, $order_id);

      if (!$stmt->execute()) {
         die("Execute failed: " . $stmt->error);
      } else {
         $message = "Order status updated successfully!";
      }
   } else {
      $message = "Invalid status value.";
   }

   // Redirect to avoid resubmission
   header("Location: adminOrderVerification.php");
   exit();
}


// Fetch all orders
$stmt = $conn->prepare("
    SELECT o.id, u.name AS user_name, o.total_price, o.status, o.created_at
    FROM orders o
    JOIN users u ON o.user_id = u.id
    ORDER BY o.created_at DESC
");
$stmt->execute();
$orders_result = $stmt->get_result();
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


      <!-- Admin verificatin start -->
      <div class="container my-4">
         <h1 class="text-center mb-4 text-primary">Order Management</h1>

         <?php if (isset($message)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?php echo htmlspecialchars($message); ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php endif; ?>

         <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
               <thead class="table-primary text-center">
                  <tr>
                     <th>Order ID</th>
                     <th>User Name</th>
                     <th>Total Price</th>
                     <th>Status</th>
                     <th>Order Date</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php while ($order = $orders_result->fetch_assoc()): ?>
                     <tr>
                        <td class="text-center"><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                        <td>₹<?php echo htmlspecialchars(number_format($order['total_price'], 2)); ?></td>
                        <td class="text-center">
                           <span
                              class="badge 
                              <?php echo ($order['status'] === 'confirmed') ? 'bg-primary' : (($order['status'] === 'rejected') ? 'bg-danger' : 'bg-success'); ?>">
                              <?php echo ucfirst($order['status']); ?>
                           </span>
                        </td>
                        <td><?php echo htmlspecialchars(date("d M Y, h:i A", strtotime($order['created_at']))); ?></td>
                        <td class="text-center">
                           <div class="d-flex align-items-center justify-content-between gap-3">
                              <!-- View Order Details -->
                              <a href="adminOrderDetails.php?order_id=<?php echo $order['id']; ?>"
                                 class="btn btn-primary px-2 py-1 rounded-pill shadow-sm" title="View Details">
                                 <i class="fas fa-eye"></i>
                              </a>
                              <!-- Change Status Form -->
                              <form method="POST" action="adminOrderVerification.php"
                                 class="d-flex align-items-center gap-2">
                                 <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                 <select name="status" class="form-select form-select-sm w-auto">
                                    <option value="pending" <?php echo ($order['status'] === 'pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="confirmed" <?php echo ($order['status'] === 'confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                                    <option value="rejected" <?php echo ($order['status'] === 'rejected') ? 'selected' : ''; ?>>Rejected</option>
                                 </select>
                                 <button type="submit" class="btn btn-primary px-2 py-1 rounded-pill shadow-sm">
                                    <i class="fas fa-check"></i> Update
                                 </button>
                              </form>
                           </div>

                        </td>
                     </tr>

                  <?php endwhile; ?>
               </tbody>
            </table>
         </div>
      </div>

      <!-- Admin verification end -->
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