<?php
// Include database connection
include_once "db_connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rank = $_POST["rank"];

    // SQL query to insert new officer into the database
    $sql = "INSERT INTO officers (name, email, rank) VALUES ('$name', '$email', '$rank')";

    if ($conn->query($sql) === TRUE) {
        // Case added successfully
        echo "Officer added successfully";
        // Redirect to manage_officers.php
        header("Location: manage_officers.php");
        exit();
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
