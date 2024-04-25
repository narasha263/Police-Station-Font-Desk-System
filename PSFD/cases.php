<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Desk System - Cases</title>
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
                    <a class="nav-link active" href="cases.php">Cases</a>
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
            <h2>File a Case</h2>
            <form method="post" action="process_case.php">
                <div class="form-group">
                    <label for="caseTitle">Case Title</label>
                    <input type="text" class="form-control" id="caseTitle" name="caseTitle" placeholder="Enter case title" required>
                </div>
                <div class="form-group">
                    <label for="caseDescription">Case Description</label>
                    <textarea class="form-control" id="caseDescription" name="caseDescription" rows="5" placeholder="Enter case description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="caseCategory">Case Category</label>
                    <select class="form-control" id="caseCategory" name="caseCategory" required>
                        <option value="">Select category</option>
                        <option value="Theft">Theft</option>
                        <option value="Assault">Assault</option>
                        <option value="Fraud">Fraud</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="caseLocation">Case Location</label>
                    <input type="text" class="form-control" id="caseLocation" name="caseLocation" placeholder="Enter case location" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit Case</button>
            </form>
        </div>
        <div class="col-md-4">
            

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
