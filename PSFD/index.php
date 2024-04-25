<?php
// Start session
session_start();

// Check if user is not logged in
if (!isset($_SESSION["username"])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Desk System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Header -->
<header class="bg-dark text-light p-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="logo.png" alt="Police Logo" class="img-fluid" style="max-height: 50px;">
            </div>
            <div class="col-md-8">
                <nav class="nav justify-content-end">
                    <a class="nav-link active" href="reports.php">Reports</a>
                    <a class="nav-link" href="cases.php">Cases</a>
                    <a class="nav-link" href="officers.php">Officers</a>
                    <a class="nav-link" href="about.php">About Us</a>
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link" href="admin/login.php">Admin</a>
                    <a class="nav-link" href="logout.php">Logout</a>


                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <div class="row">
    <div class="col-md-8">
    <a href="overview.php" class="text-decoration-none text-dark"> <!-- Link to Overview page -->
        <h2>Overview</h2>
        <p>Welcome to the Police Desk System. This system serves as a centralized platform for managing all police-related activities and information. Here, you can access various functionalities to streamline your tasks and improve operational efficiency.</p>
        <p>Stay updated with the latest information on ongoing investigations, upcoming events, and important announcements from the department. In addition, you can easily file reports, track case statuses, and communicate with officers.</p>
    </a>
    <h2>Quick Actions</h2>
<div class="btn-group">
    <a href="file_report.php" class="btn btn-primary"><i class="fas fa-file-alt"></i> File a Report</a>
    <a href="contact_officer.php" class="btn btn-primary"><i class="fas fa-user"></i> Contact an Officer</a>
</div>

    
</div>

       
    </div>
</main>

<!-- Footer -->
<footer class="bg-dark text-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Contact Information</h5>
                <p>Address: Thika Street, City</p>
                <p>Email: contact@police.com</p>
                <p>Phone: +254 741 587996</p>
            </div>
            <div class="col-md-6">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="tos.php">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
