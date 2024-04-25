<?php
// Start session
session_start();

// Check if user is already logged in, redirect to admin dashboard
if (isset($_SESSION["admin_username"])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username and password (You should enhance this with more secure validation and password hashing)
    $username = $_POST["username"];
    $password = $_POST["password"];

    // For demonstration purposes, checking hardcoded username and password
    $admin_username = "admin";
    $admin_password = "admin";

    if ($username === $admin_username && $password === $admin_password) {
        // Authentication successful, set session variables and redirect to admin dashboard
        $_SESSION["admin_username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Authentication failed, display error message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Police Desk System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Admin Login</div>
                <div class="card-body">
                    <?php
                    if (isset($error_message)) {
                        echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
                    }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
