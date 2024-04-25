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
        <a class="nav-link" href="contact.php">view contacts</a>

        <a class="nav-link" href="logout.php">Logout</a>
    </nav>
</div>
<div class="content">
<!-- Main Content -->
<main class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Contact Messages</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Message ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database connection
                    include_once "db_connection.php";

                    // SQL query to fetch contact messages from the database
                    $sql = "SELECT * FROM messages";
                    $result = $conn->query($sql);

                    // Check if there are any contact messages
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
                            echo "<td>" . $row["created_at"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No contact messages found</td></tr>";
                    }
                    // Close database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
