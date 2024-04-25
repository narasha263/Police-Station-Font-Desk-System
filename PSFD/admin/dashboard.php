<?php
session_start();
if (!isset($_SESSION["admin_username"])) {
    header("Location: login.php");
    exit();
}
$admin_username = $_SESSION["admin_username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Police Desk System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 70px; /* Adjust according to your header height */
            color: #fff;
        }

        .sidebar-nav .nav-link {
            color: #fff;
        }

        .content {
            margin-left: 250px; /* Same as sidebar width */
        }
       /* styles.css */

/* Footer */
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #343a40;
    color: #fff;
    padding: 20px 0;
    text-align: center; /* Padding top and bottom */
}

footer h5 {
    color: #fff; /* Light text color for footer headings */
}

footer a {
    color: #fff; /* Light text color for footer links */
}

footer a:hover {
    text-decoration: underline; /* Underline on hover for footer links */
}

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <nav class="nav flex-column">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
        <a class="nav-link" href="manage_reports.php">Manage Reports</a>
        <a class="nav-link" href="manage_cases.php">Manage Cases</a>
        <a class="nav-link" href="manage_officers.php">Manage Officers</a>
        <a class="nav-link" href="manage_users.php">Manage Users</a>
        <a class="nav-link" href="logout.php">Logout</a>
    </nav>
</div>

<!-- Main Content -->
<main class="container-fluid my-5 content">
    <div class="row">
        <div class="col-md-12">
            <h2>Welcome to the Admin Dashboard</h2>
            <p>Here, you can manage various aspects of the police desk system.</p>
            <!-- Add more content and widgets here -->
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
