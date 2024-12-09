<?php
// Start the session
session_start();

// Include database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "craft";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration form submission
$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate input
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "Email is already registered.";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                $success_message = "Registration successful! You can now <a href='userLogin.php'>log in</a>.";
            } else {
                $error_message = "Error: Could not register. Please try again.";
            }
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
    <title>Craft Loving | User Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="img/logo1.png" type="image/x-icon">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card shadow-lg p-4">
                    <h3 class="text-center text-primary">Register</h3>
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($success_message)): ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="register.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="userLogin.php" class="text-primary">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
