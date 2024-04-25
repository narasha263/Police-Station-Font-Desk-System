<?php
session_start();
if (!isset($_SESSION["admin_username"])) {
    header("Location: login.php");
    exit();
}

// Check if officer ID is provided in the URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include database connection
    include_once "db_connection.php";

    // Prepare a delete statement
    $delete_sql = "DELETE FROM officers WHERE id = ?";

    if ($stmt = $conn->prepare($delete_sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Records deleted successfully. Redirect to manage_officers page
            header("location: manage_officers.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
} else {
    // URL doesn't contain id parameter. Redirect to error page or handle the error as needed
    header("location: error.php");
    exit();
}
?>
