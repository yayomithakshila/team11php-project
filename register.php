<?php 
$title = "Sign-in page";
include 'layout-folder/header.php';

// set a variable to hold the message
$message = '';

// What to do with the data

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hashing the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connecting to the database server
    include 'db.php';

    // Checking if the email already exists or not
    $existing_user_query = "SELECT * FROM user_register WHERE email = '$email'";
    $existing_user_result = $conn->query($existing_user_query);

    if ($existing_user_result->num_rows > 0) {
        $message = "User with this email already exists. Please choose a different email or log-in.";
    } else {
        // SQL statement to insert data to the database table and diplay the success message
        $insert_query = "INSERT INTO user_register (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

        if ($conn->query($insert_query) === TRUE) {
            $message = "Your sign-in was successful!";
        } else {
            $message = "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    // Closing database connection
    $conn->close();
} 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Sign Up</h3>
                </div>
                <div class="card-body">
                    
                    <!-- Display the message for success login -->
                    <?php if (!empty($message)) { ?>
                        <div class="alert <?php echo ($message == "Your sign-in was successful!") ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php } ?>

                    <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" required id="first_name"  minlength="5" maxlength="30">
                            <span id="first_nameError" > </span>
                        </div>
                        <div class="form-group">    
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control"  name="last_name" required id="last_name" minlength="5" maxlength="30">
                            <span id="last_nameError" > </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  name="email" required id="email">
                            <span id="emailError" > </span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control"  name="password" required minlength="7" maxlength="20" id="password">
                            <span id="passwordError" > </span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Re-enter Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">I accept the terms of use</label>
                        </div>
                        <button type="submit"  name="submit" class="btn btn-primary btn-block mt-3">Register</button>
                    </form>

                     <!-- Java srcipt goes here -->

<script>
//function to validate first name
function validateFName(){
const name= document.getElementById("first_name").value;
const nameError = document.getElementById("first_nameError");

if (name.length < 5 || name.length > 20 ){
    nameError.innerHTML ="Name must be 5 & 20 characters";
    return false;
}

else{
    nameError.innerHTML = "";
    return true;
}

}

//function to validate last name
function validateLName(){
const name= document.getElementById("last_name").value;
const nameError = document.getElementById("last_nameError");

if (name.length < 5 || name.length > 20 ){
    nameError.innerHTML ="Name must be 5 & 20 characters";
    return false;
}

else{
    nameError.innerHTML = "";
    return true;
}

}

// function to validate email
function validateEmail(){
const email= document.getElementById("email").value;
const emailError = document.getElementById("emailError");

if (email === "" || !email.includes("@")){
    emailError.innerHTML ="Please enter a valid email address";
    return false;
}

else{
    emailError.innerHTML = "";
    return true;
}

}

//function to validate password
function validatePassword(){
const password= document.getElementById("password").value;
const passwordError = document.getElementById("passwordError");

if (password.length < 6 ){
    passwordError.innerHTML ="Password must be at least 6 characters long";
    return false;
}

else{
    passwordError.innerHTML = "";
    return true;
}

}

//event listerners for real time validation

document.getElementById("first_name").addEventListener("input", validateFName);
document.getElementById("last_name").addEventListener("input", validateLName);
document.getElementById("email").addEventListener("input", validateEmail);
document.getElementById("password").addEventListener("input", validatePassword);

</script>

                    <p class="text-center mt-3">Already have an account? <a href="login.php">Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'layout-folder/footer.php'; ?>
