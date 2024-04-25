<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File a Report - Police Desk System</title>
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
                    <a class="nav-link" href="reports.php">Reports</a>
                    <a class="nav-link" href="cases.php">Cases</a>
                    <a class="nav-link" href="officers.php">Officers</a>
                    <a class="nav-link" href="about.php">About Us</a>
                </nav>
            </div>
        </div>
    </div>
</header>


<main class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2>File a Report</h2>
            <p>This is the page where you can file a report with the Police Desk System. Please fill out the form below to submit your report.</p>
            <!-- Report Form -->
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
                <button type="submit" class="btn btn-primary">Submit Report</button>
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
