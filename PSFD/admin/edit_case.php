<?php
// Include database connection
include_once "db_connection.php";

// Check if case ID is provided via GET parameter
if(isset($_GET['id'])) {
    $case_id = $_GET['id'];
    
    // SQL query to fetch case data by ID
    $sql = "SELECT * FROM cases WHERE id = $case_id";
    $result = $conn->query($sql);

    // Check if case data exists
    if ($result->num_rows > 0) {
        $case = $result->fetch_assoc(); // Fetch case data
    } else {
        // Redirect or handle error if case data is not found
        header("Location: cases.php");
        exit();
    }
} else {
    // Redirect or handle error if case ID is not provided
    header("Location: cases.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Case - Police Desk System</title>
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
                    <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
                    <!-- Add other navigation links if needed -->
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edit Case</h2>
            <!-- Add your form for editing the case here -->
            <form method="POST" action="update_case.php">
    <input type="hidden" name="id" value="<?php echo $case['id']; ?>">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $case['title']; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"><?php echo $case['description']; ?></textarea>
    </div>
    <!-- Add more input fields for other case details as needed -->
    <button type="submit" class="btn btn-primary">Update Case</button>
</form>

        </div>
    </div>
</main>

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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
