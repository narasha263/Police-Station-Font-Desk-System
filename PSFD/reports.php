<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Police Desk System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom CSS styles */
        .btn-file {
            margin-top: 20px;
        }
    </style>
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
                    <a class="nav-link active" href="reports.php">Reports</a>
                    <a class="nav-link" href="cases.php">Cases</a>
                    <a class="nav-link" href="officers.php">Officers</a>
                    <a class="nav-link" href="about.php">About Us</a>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Reports</h2>
            <p>This is the reports page of the Police Desk System. Here, you can view and manage all the reports filed by users.</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Include database connection
                            include_once "db_connection.php";

                            // SQL query to fetch reports from the database
                            $sql = "SELECT * FROM reports";
                            $result = $conn->query($sql);

                            // Check if there are any reports
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row["id"]."</td>";
                                    echo "<td>".$row["title"]."</td>";
                                    echo "<td>".$row["description"]."</td>";
                                    echo "<td>".$row["category"]."</td>";
                                    echo "<td>".$row["location"]."</td>";
                                    echo "<td>".$row["datetime"]."</td>";
                                    echo "<td>";
                                    // Add action buttons here if needed
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No reports found</td></tr>";
                            }
                            // Close database connection
                            $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h2>File Report</h2>
            <form method="post" action="process_report.php">
                <div class="form-group">
                    <label for="reportTitle">Report Title</label>
                    <input type="text" class="form-control" id="reportTitle" name="reportTitle" placeholder="Enter report title" required>
                </div>
                <div class="form-group">
                    <label for="reportDescription">Report Description</label>
                    <textarea class="form-control" id="reportDescription" name="reportDescription" rows="5" placeholder="Enter report description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="reportCategory">Category</label>
                    <select class="form-control" id="reportCategory" name="reportCategory" required>
                        <option value="">Select a category</option>
                        <option value="Theft">Theft</option>
                        <option value="Assault">Assault</option>
                        <option value="Vandalism">Vandalism</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="reportLocation">Location</label>
                    <input type="text" class="form-control" id="reportLocation" name="reportLocation" placeholder="Enter incident location" required>
                </div>
                <div class="form-group">
                    <label for="reportDateTime">Date/Time of Incident</label>
                    <input type="datetime-local" class="form-control" id="reportDateTime" name="reportDateTime" required>
                </div>
                <button type="submit" class="btn btn-primary btn-file">Submit Report</button>
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

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
