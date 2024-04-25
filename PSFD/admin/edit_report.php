<?php
// Include database connection
include_once "db_connection.php";

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $reportId = $_GET['id'];
    
    // Fetch report details from the database
    $sql = "SELECT * FROM reports WHERE id = $reportId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Report found, retrieve data
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['description'];
        $category = $row['category'];
        $location = $row['location'];
        $datetime = $row['datetime'];
    } else {
        // No report found with the given ID
        echo "No report found with ID: $reportId";
        exit; // Exit script
    }
} else {
    // ID parameter is not set
    echo "Report ID is missing";
    exit; // Exit script
}
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
        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
        <a class="nav-link" href="manage_reports.php">Manage Reports</a>
        <a class="nav-link" href="manage_cases.php">Manage Cases</a>
        <a class="nav-link" href="manage_officers.php">Manage Officers</a>
        <a class="nav-link" href="manage_users.php">Manage Users</a>
        <a class="nav-link" href="logout.php">Logout</a>
    </nav>
</div>

<div class="content">
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
                    <a class="nav-link" href="manage_reports.php">Manage Reports</a>
                    <!-- Add other navigation links as needed -->
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Edit Report</h2>
            <!-- Report Form -->
            <form method="post" action="update_report.php">
                <input type="hidden" name="reportId" value="<?php echo $reportId; ?>">
                <div class="form-group">
                    <label for="reportTitle">Report Title</label>
                    <input type="text" class="form-control" id="reportTitle" name="reportTitle" value="<?php echo $title; ?>" required>
                </div>
                <div class="form-group">
                    <label for="reportDescription">Report Description</label>
                    <textarea class="form-control" id="reportDescription" name="reportDescription" rows="5" required><?php echo $description; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="reportCategory">Category</label>
                    <input type="text" class="form-control" id="reportCategory" name="reportCategory" value="<?php echo $category; ?>" required>
                </div>
                <div class="form-group">
                    <label for="reportLocation">Location</label>
                    <input type="text" class="form-control" id="reportLocation" name="reportLocation" value="<?php echo $location; ?>" required>
                </div>
                <div class="form-group">
                    <label for="reportDatetime">Date & Time</label>
                    <input type="datetime-local" class="form-control" id="reportDatetime" name="reportDatetime" value="<?php echo date('Y-m-d\TH:i', strtotime($datetime)); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Report</button>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
