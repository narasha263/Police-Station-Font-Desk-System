<?php
// Include database connection
include_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $case_id = $_POST['id']; // Using the 'id' field instead of 'case_id'
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Add more fields as needed

    // Update case in the database
    $sql = "UPDATE cases SET title='$title', description='$description' WHERE id=$case_id";

    if ($conn->query($sql) === TRUE) {
        // Case updated successfully
        echo "Case updated successfully";
        // Redirect to cases.php
        header("Location: manage_cases.php");
        exit();
    } else {
        // Error updating case
        echo "Error updating case: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
