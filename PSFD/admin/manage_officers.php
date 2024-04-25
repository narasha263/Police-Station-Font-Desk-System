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
<main class="container-fluid my-5 content">
    <div class="row">
        <div class="col-md-12">
            <h2>Manage Officers</h2>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Officers</h2>
                        <p>This is the officers page of the Admin Dashboard. Here, you can view and manage all the officers.</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Officer ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Rank</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Fetch officers from the database and populate the table -->
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
                                        echo "<td>";
                                        echo "<a href='edit_officer.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a>";
                                        echo "<a href='delete_officer.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No officers found</td></tr>";
                                }
                                // Close database connection
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <h2>Add New Officer</h2>
        <form action="add_officer.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="rank">Rank</label>
                <select class="form-control" id="rank" name="rank" required>
                    <option value="">Select Rank</option>
                    <option value="Constable/Office">Constable/Office</option>
                    <option value="Corporal/Sergeant">Corporal/Sergeant</option>
                    <option value="Sergeant">Sergeant</option>
                    <option value="Lieutenant">Lieutenant</option>
                    <option value="Captain">Captain</option>
                    <option value="Major">Major</option>
                    <option value="Inspector">Inspector</option>
                    <option value="Chief Inspector">Chief Inspector</option>
                    <option value="Superintendent">Superintendent</option>
                    <option value="Chief">Chief</option>
                    <!-- Add more rank options as needed -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Officer</button>
        </form>
    </div>
</div>

</main>



<!-- Footer -->
<!-- Include
