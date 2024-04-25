<?php
// Start session
session_start();

// Include database connection
include_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to retrieve user data based on username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, store user data in session and redirect to dashboard
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect, display error message
            $_SESSION["login_error"] = "Invalid username or password";
            header("Location: login.php");
            exit();
        }
    } else {
        // User does not exist, display error message
        $_SESSION["login_error"] = "Invalid username or password";
        header("Location: login.php");
        exit();
    }
}
?>
