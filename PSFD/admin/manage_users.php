<?php
session_start();
if (!isset($_SESSION["admin_username"])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];

    // Insert new user into the database
    $insert_sql = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";

    if ($conn->query($insert_sql) === TRUE) {
        // New user added successfully
        header("Location: manage_users.php");
        exit();
    } else {
        // Error adding new user
        echo "Error: " . $conn->error;
    }
}

// Fetch users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Close database connection
$conn->close();
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

<!-- Main Content -->
<main class="container-fluid my-5 content">
    <div class="row">
        <div class="col-md-12">
            <h2>Manage Users</h2>

            <!-- Add User Form -->
            <div class="mb-3">
                <h4>Add User</h4>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="new_username">Username:</label>
                        <input type="text" class="form-control" id="new_username" name="new_username" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>

            <!-- Users Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any users
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["password"] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_user.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a>";
                            echo "<a href='delete_user.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No users found</td></tr>";
                    }
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
