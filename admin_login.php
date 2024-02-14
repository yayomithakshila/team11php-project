<?php 
 $title = "Admin_login page";
 include 'layout-folder/header.php'; ?> 
 

 

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Admin Login</h1>
                        <form method="post" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="inputPassword" required>
                            </div>
                            
                            <button class="btn btn btn-primary btn-block" type="submit" name="submit">Login</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
// Include the database connection file
include 'db.php';

if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    $user_name = $_POST['username'];
    $inputPassword = $_POST['inputPassword'];

    $sql = "SELECT * FROM admin WHERE user_name='$user_name'";

    // Execute the SQL query and store the result
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $password = $row['password'];

        if ($password === $inputPassword) {
            
           
          header('Location:admin.php');
            

        } else {
            echo "<p>Password error</p>";
        }
    } else {
        // Display a message if no results are found
        echo "<p>Please enter correct user ID</p>";
    }
}else
{
    echo "error";
}

// Close the connection when done
$conn->close();
?>



<?php include 'layout-folder/footer.php'; ?>