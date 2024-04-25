<?php
// Include database connection
include_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $reportId = $_POST['reportId'];
    $reportTitle = $_POST['reportTitle'];
    $reportDescription = $_POST['reportDescription'];
    $reportCategory = $_POST['reportCategory'];
    $reportLocation = $_POST['reportLocation'];
    $reportDatetime = $_POST['reportDatetime'];

    // Update report in the database
    $sql = "UPDATE reports SET 
            title = '$reportTitle', 
            description = '$reportDescription', 
            category = '$reportCategory', 
            location = '$reportLocation', 
            datetime = '$reportDatetime' 
            WHERE id = $reportId";

    if ($conn->query($sql) === TRUE) {
        // Report updated successfully
        header("Location: manage_reports.php");
        exit;
    } else {
        // Error updating report
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
