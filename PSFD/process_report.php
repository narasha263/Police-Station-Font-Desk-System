<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include_once "db_connection.php";

    // Retrieve form data
    $reportTitle = $_POST['reportTitle'];
    $reportDescription = $_POST['reportDescription'];
    $reportCategory = $_POST['reportCategory'];
    $reportLocation = $_POST['reportLocation'];
    $reportDateTime = $_POST['reportDateTime'];

    // SQL query to insert report data into the database
    $sql = "INSERT INTO reports (title, description, category, location, datetime) VALUES (?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssss", $reportTitle, $reportDescription, $reportCategory, $reportLocation, $reportDateTime);

    // Execute the statement
    if ($stmt->execute()) {
        // Report submitted successfully
        // Redirect back to the reports page or display a success message
        header("Location: admin/manage_reports.php?success=true");
        exit;
    } else {
        // Error occurred while submitting the report
        // Handle the error accordingly, redirect to an error page or display an error message
        header("Location: reports.php?error=true");
        exit;
    }

    // Close the statement
    $stmt->close();
    
    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect to the file a report page
    header("Location: file_report.php");
    exit;
}
?>
