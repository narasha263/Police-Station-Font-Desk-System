<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "police station"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert form data into database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "setTimeout(function(){ alert('Message sent successfully. An officer will contact you shortly.'); }, 3000);"; // 3000 milliseconds = 3 seconds
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact an Officer - Police Desk System</title>
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
                <a class="nav-link" href="index.php">Home Page</a>
                    <a class="nav-link" href="reports.php">Reports</a>
                    <a class="nav-link" href="cases.php">Cases</a>
                    <a class="nav-link" href="officers.php">Officers</a>
                    <a class="nav-link" href="about.php">About Us</a>
                    <a class="nav-link" href="admin/login.php">Admin</a>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Contact an Officer</h2>
            <p>If you need to contact an officer for any assistance or inquiry, please fill out the form below:</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
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
