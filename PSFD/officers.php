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
                    <a class="nav-link" href="index.php">Home Page</a>
                    <a class="nav-link" href="reports.php">Reports</a>
                    <a class="nav-link" href="cases.php">Cases</a>
                    <a class="nav-link active" href="officers.php">Officers</a>
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
            <h2>Officers</h2>
            <p>Below is the list of all officers:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Officer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database connection
                    include_once "db_connection.php";

                    // SQL query to fetch officers from the database
                    $sql = "SELECT * FROM officers";
                    $result = $conn->query($sql);

                    // Check if there are any officers
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No officers found</td></tr>";
                    }
                    // Close database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
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
