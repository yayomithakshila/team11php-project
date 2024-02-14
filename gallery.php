<?php 
$title = "Gallery page";
include 'layout-folder/header.php';

include 'db.php';

// SQL query to retrieve data from the 'image_gallery' table
$sql = "SELECT * FROM image_gallery";

// Execute the SQL query and store the result
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo '<div class="section text-left">
            <div class="row">
                <div class="textOnVideo col">
                    <div class="container mt-5" style="padding-top: 90px; padding-bottom: 20px;">
                        <h3 style="text-align: center;">Image Gallery</h3>
                        <div id="carouselExample" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">';
    // Loop through the result set and display data in carousel items
    $first = true; // Flag to set the first item as active
    while ($row = $result->fetch_assoc()) {
        $active = $first ? 'active' : ''; // Set 'active' class for the first item
        echo '<div class="carousel-item ' . $active . '">
        <img src="' . $row['file_name'] . '" class="d-block w-700" alt="Image" width="600" height="400">
      </div>';
        $first = false; // Update flag after the first iteration
    }
    echo '</div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
</div>
</div>';
} else {
    // Display a message if no results are found
    echo "No results";
}
// Close the database connection when done
$conn->close();

include 'layout-folder/footer.php';
?>
