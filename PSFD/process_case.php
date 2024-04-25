<?php
// Include database connection
include_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $caseTitle = $_POST['caseTitle'];
    $caseDescription = $_POST['caseDescription'];
    $caseCategory = $_POST['caseCategory'];
    $caseLocation = $_POST['caseLocation'];

    // SQL query to insert case into database
    $sql = "INSERT INTO cases (title, description, category, location) VALUES ('$caseTitle', '$caseDescription', '$caseCategory', '$caseLocation')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Case filed successfully');</script>";
        // Redirect to cases.php
        echo "<script>window.location.href = 'cases.php';</script>";
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
