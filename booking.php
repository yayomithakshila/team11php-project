<?php 
$title = "Reservation page";
include 'layout-folder/header.php';

// session start if the user is logged in

if(empty($_SESSION['user']) || $_SESSION['user'] != 1) {
    header('Location: login.php');
    exit();
}

// Database connection file
include 'db.php';

// Booking success message variable
$bookingSuccessMessage = '';

// Check if form is submitted or not
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $check_in_date = mysqli_real_escape_string($conn, $_POST['check_in_date']);
    $num_guests = mysqli_real_escape_string($conn, $_POST['num_guests']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // sql query to insert data into database
    $sql = "INSERT INTO reservation (name, check_in_date, num_guests, message) VALUES ('$name', '$check_in_date', '$num_guests', '$message')";
    if (mysqli_query($conn, $sql)) {
        // Display booking successful message
        $bookingSuccessMessage = "Booking successful!";
    } else {
        $bookingSuccessMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Book Your Stay</h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($bookingSuccessMessage)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $bookingSuccessMessage; ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required minlength="5" maxlength="30">
                            <span id="nameError"></span><br>
                        </div>
    
                        <div class="form-group">
                            <label for="check_in_date">Check-in Date</label>
                            <input type="date" class="form-control" id="check_in_date" name="check_in_date" required>
                            <span id="dateError"></span><br>
                        </div>
                        <div class="form-group">
                            <label for="num_guests">Number of Guests</label>
                            <input type="number" class="form-control" id="num_guests" name="num_guests" required min="4" max="10">
                            <span id="num_guestsError"></span>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required minlength="15" maxlength="100"></textarea>
                            <span id="messageError"></span><br>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout-folder/footer.php'; ?>

<script>
    // Function to validate name
    function validateName() {
        const name = document.getElementById("name").value;
        const nameError = document.getElementById("nameError");

        if (name.length < 5 || name.length > 30) {
            nameError.innerHTML = "Name must be between 5 and 30 characters";
            return false;
        } else {
            nameError.innerHTML = "";
            return true;
        }
    }

    // Function to validate number of guests
    function validateNumGuests() {
        const num_guests = document.getElementById("num_guests").value;
        const num_guestsError = document.getElementById("num_guestsError");

        if (num_guests < 4 || num_guests > 10) {
            num_guestsError.innerHTML = "Number of guests must be between 1 and 10";
            return false;
        } else {
            num_guestsError.innerHTML = "";
            return true;
        }
    }

    // Function to validate message
    function validateMessage() {
        const message = document.getElementById("message").value;
        const messageError = document.getElementById("messageError");

        if (message.length < 15 || message.length > 100) {
            messageError.innerHTML = "Message must be between 15 and 100 characters";
            return false;
        } else {
            messageError.innerHTML = "";
            return true;
        }
    }

    // Function to validate date
    function validateDate() {
        const check_in = document.getElementById('check_in_date').value;
        const dateError = document.getElementById('dateError');
        var currentDate = new Date();
        var selectedDate = new Date(check_in);

        if (selectedDate <= currentDate) {
            dateError.innerHTML = 'Please select a future date.';
            return false;
        } else {
            dateError.innerHTML = '';
            return true;
        }
    }

    // Event listeners for real-time validation
    document.getElementById("name").addEventListener("input", validateName);
    document.getElementById("num_guests").addEventListener("input", validateNumGuests);
    document.getElementById("message").addEventListener("input", validateMessage);
    document.getElementById("check_in_date").addEventListener("change", validateDate);
</script>
