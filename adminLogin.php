<?php
// Start session
session_start();

// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "craft"; // Replace with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message
$error_message = "";

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = trim($_POST['username']);
    $admin_password = trim($_POST['password']);

    // Validate input
    if (empty($admin_username) || empty($admin_password)) {
        $error_message = "Username and password are required.";
    } else {
        // Prepare and execute SQL statement
        $stmt = $conn->prepare("SELECT id, password FROM admin WHERE username = ?");
        $stmt->bind_param("s", $admin_username);
        $stmt->execute();
        $stmt->store_result();

        // Check if admin exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($admin_password, $hashed_password)) {
                // Set session variables for admin
                $_SESSION['admin_id'] = $id;
                $_SESSION['admin_username'] = $admin_username;
                header("Location: adminDashboard.php"); // Redirect to admin dashboard
                exit();
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "No account found with that username.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card shadow-lg p-4">
                    <h3 class="text-center text-primary">Admin Login</h3>
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="adminLogin.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
