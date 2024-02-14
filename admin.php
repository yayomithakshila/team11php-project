<?php 
 $title = "Admin page";
 include 'layout-folder/header.php'; ?> 

<form name="create1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

<div class="form-floating mb-3">
  <input type="file" class="form-control" id="floatingInput" name="fileToUpload" required>
  <label for="floatingInput">Upload Image</label>
</div>



<br><br>
<button type="submit" class="btn btn-light" name="submit">Submit</button>
</form>

<?php
 
// Check if the 'submit' button in the form was clicked
if (isset($_POST['submit'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Retrieve data from the form and store it in variables
    
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 10000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

  

    // Include the database connection file
    include 'db.php';

    // Define an SQL query to insert data into the 'studentsinfo' table
    $sql = "INSERT INTO image_gallery (file_name)
            VALUES ('$target_file')";

    // Execute the SQL query using the database connection
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, display a success message
        echo "<h3>New record added sucessfully</h3>";
    } else {
        // If there was an error in the query, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}else{

    
}

include 'db.php';
// SQL query to retrieve data from the 'travel' table
$sql = "SELECT * FROM image_gallery";

// Execute the SQL query and store the result
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table class='table'>
            <thead>
                <tr>
                    
                    <th>image</th>
                   
                    

                </tr>
            </thead>
            <tbody>";

    // Loop through the result set and display data in rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        
        <td><img src='{$row['file_name']}' width='300' height='300' alt='Image'></td>
        <td><a href='image_remove.php?id={$row['image_id']}' class='btn btn-danger btn-sm'>Delete</a></td>
      </tr>";

    }

    echo "</tbody></table>";
} else {
    // Display a message if no results are found
    echo "No results";
}
// close the connection when done
$conn->close();
?>












<?php include 'layout-folder/footer.php'; ?>