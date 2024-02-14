<?php
$title = "Reviews page";
include 'layout-folder/header.php';
?>


<?php
// database connection
include 'db.php';

// form submission
$message = ""; // Initialize an empty message variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["user_id"];
    $review = $_POST["content"];
    $rating = $_POST["rating"];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO reviews (name, review, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $review, $rating);
    $stmt->execute();

    // Close  statement
    $stmt->close();

    $message = "Review submitted successfully!";
}

// Fetching reviews data from the database table reviews
$sql = "SELECT name, review, rating FROM reviews"; 
$result = $conn->query($sql);
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Past Reviews</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Review table -->
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Review</th>
                                    <th scope="col">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["review"] . "</td>";
                                        echo "<td>" . $row["rating"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No reviews found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review Submission Form -->
<div class="container">
    <h2 class="mt-5">Add a Review</h2>
    <form name="review" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control"  name="user_id" required minlength="5" maxlength="30"id="name">
            <span id="nameError" > </span><br>
        </div>
        <div class="form-group">
            <label for="content">Review:</label>
            <textarea class="form-control" id="content" name="content" rows="5" required minlength="15" maxlength="100"></textarea>
            <span id="contentError" > </span><br>
        </div>
        <div class="form-group">
            <label for="rating">Rating (1-5):</label>
            <input type="number" class="form-control" required id="rating" name="rating" min="1" max="5" >
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>


                     <!-- Java srcipt goes here -->

                     <script>
//function to validate  name
function validateName(){
const name= document.getElementById("name").value;
const nameError = document.getElementById("nameError");

if (name.length < 5 || name.length > 30 ){
    nameError.innerHTML ="Name must be 5 & 30 characters";
    return false;
}

else{
    nameError.innerHTML = "";
    return true;
}

}

//function to validate reviews
function validateContent(){
const name= document.getElementById("content").value;
const nameError = document.getElementById("contentError");

if (name.length < 15 || name.length > 100 ){
    nameError.innerHTML ="Review must be 15 & 100 characters";
    return false;
}

else{
    nameError.innerHTML = "";
    return true;
}

}


//event listerners for real time validation

document.getElementById("name").addEventListener("input", validateName);
document.getElementById("content").addEventListener("input", validateContent);

</script>


    <?php
    if ($message) {
        echo '<div class="alert alert-success mt-3" role="alert">' . $message . '</div>';
    }
    ?>
</div>

<?php include 'layout-folder/footer.php'; ?>
