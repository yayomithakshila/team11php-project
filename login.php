<?php
$title = "Login page";
include 'layout-folder/header.php';

if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] == 1) {
        header('Location: rates.php');
        exit();
    }
}

// Database connection file
include 'db.php';

// set the login status message to a variable 
$loginStatus = '';

// Check to verify if form is submitted or not
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // escape user inputs for security
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL  for getting user data
    $sql = "SELECT * FROM user_register WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result === false) {
        // if Query failed, display error message
        die("Query failed: " . $conn->error);
        $loginStatus = "Invalid email or password. Please try again.";
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // verify the password
            if (password_verify($password, $row['password'])) {
                // if the User found and password is correct, login is successful
                $_SESSION['user'] = 1;
                $_SESSION['first_name'] = $row['first_name'];
                // Redirect to rates  page to do the reservation
                header("Location: rates.php");
                exit(); // close the script execution after redirection
            } else { 
                // If password is incorrect, display error message
                $loginStatus = "Invalid email or password. Please try again.";
            }
        } else {
            // If No user found with the provided email, display the error message
            $loginStatus = "Invalid email or password. Please try again.";
        }
    }
}

// Close connection
$conn->close();
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <span id="emailError"> </span><br>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required minlength="7" maxlength="20">
                                <span id="passwordError"> </span><br>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3" name="submit">Login</button>
                        </form>

                        <script>
                            // function to validate email
                            function validateEmail() {
                                const email = document.getElementById("email").value;
                                const emailError = document.getElementById("emailError");

                                if (email === "" || !email.includes("@")) {
                                    emailError.innerHTML = "Please enter a valid email address";
                                    return false;
                                } else {
                                    emailError.innerHTML = "";
                                    return true;
                                }
                            }

                            //function to validate password
                            function validatePassword() {
                                const password = document.getElementById("password").value;
                                const passwordlError = document.getElementById("passwordError");

                                if (password.length < 6) {
                                    passwordError.innerHTML = "Password must be at least 6 characters long";
                                    return false;
                                } else {
                                    passwordError.innerHTML = "";
                                    return true;
                                }
                            }

                            //event listerners for real time validation
                            document.getElementById("email").addEventListener("input", validateEmail);
                            document.getElementById("password").addEventListener("input", validatePassword);
                        </script>


                        <p class="text-center mt-3">Don't have an account? <a href="register.php">Sign up</a></p>
                        <?php if (!empty($loginStatus)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $loginStatus; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout-folder/footer.php'; ?>
