<?php
session_start();
if (!isset($_SESSION["admin_username"])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include_once "db_connection.php";

// Check if user ID is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user data based on ID
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, fetch user details
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $password = $row['password'];
    } else {
        // User not found, redirect to manage_users.php
        header("Location: manage_users.php");
        exit();
    }
} else {
    // ID not provided, redirect to manage_users.php
    header("Location: manage_users.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];

    // Update user information in the database
    $update_sql = "UPDATE users SET username = '$new_username', password = '$new_password' WHERE id = $user_id";

    if ($conn->query($update_sql) === TRUE) {
        // User information updated successfully
        header("Location: manage_users.php");
        exit();
    } else {
        // Error updating user information
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Police Desk System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Main Content -->
<main class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Edit User</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $user_id; ?>">
                <div class="form-group">
                    <label for="new_username">Username:</label>
                    <input type="text" class="form-control" id="new_username" name="new_username" value="<?php echo $username; ?>" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Password:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" value="<?php echo $password; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="manage_users.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
