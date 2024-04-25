<?php
// Include database connection
include_once "db_connection.php";

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate officer ID
    if(isset($_POST["id"]) && !empty(trim($_POST["id"]))){
        // Prepare an UPDATE statement
        $sql = "UPDATE officers SET name=?, email=?, rank=? WHERE id=?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $param_name, $param_email, $param_rank, $param_id);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            $param_email = trim($_POST["email"]);
            $param_rank = trim($_POST["rank"]);
            $param_id = trim($_POST["id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Officer updated successfully, redirect to manage_officers.php
                header("location: manage_officers.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
} else{
    // ID parameter is missing, redirect to error page
    header("location: error.php");
    exit();
}
?>
