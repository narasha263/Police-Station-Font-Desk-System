<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Officer - Police Desk System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <h2>Edit Officer</h2>
            <?php
            // Check if officer ID is provided
            if(isset($_GET['id']) && !empty(trim($_GET['id']))){
                // Include database connection
                include_once "db_connection.php";

                // Prepare a SELECT statement to retrieve officer details
                $sql = "SELECT * FROM officers WHERE id = ?";
                
                if($stmt = $conn->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("i", $param_id);
                    
                    // Set parameters
                    $param_id = trim($_GET['id']);
                    
                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        // Store result
                        $result = $stmt->get_result();
                        
                        if($result->num_rows == 1){
                            // Fetch row
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            
                            // Retrieve individual field values
                            $name = $row['name'];
                            $email = $row['email'];
                            $rank = $row['rank'];
                        } else{
                            // No officer found with the provided ID
                            echo "<div class='alert alert-danger'>No officer found with ID: " . $_GET['id'] . "</div>";
                        }
                    } else{
                        echo "<div class='alert alert-danger'>Oops! Something went wrong. Please try again later.</div>";
                    }

                    // Close statement
                    $stmt->close();
                }
                
                // Close connection
                $conn->close();
            } else{
                // ID parameter is missing or empty
                echo "<div class='alert alert-danger'>Invalid request. Please <a href='manage_officers.php'>go back</a> and try again.</div>";
            }
            ?>
            <form action="update_officer.php" method="post">
                <input type="hidden" name="id" value="<?php echo $param_id; ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label>Rank</label>
                    <input type="text" name="rank" class="form-control" value="<?php echo $rank; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                    <a href="manage_officers.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
