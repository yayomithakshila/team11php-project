<?php 
$title = "image_remove page";
include 'layout-folder/header.php';

include 'db.php';
$a = $_GET['id'];
// SQL query to retrieve data from the 'image_gallery' table
$result = mysqli_query($conn,"SELECT * FROM image_gallery WHERE image_id= '$a'");
$row= mysqli_fetch_array($result);

?>
<form name="create1" method="post" action="">
<img src='<?php echo $row['file_name']; ?>' width='300' height='300' alt='Image'>

<button type="submit" class="btn btn-danger" name="delete">Delete</button>
<a class="btn btn-primary" href="admin.php" role="button">Back</a>
</form>
<?php
if (isset($_POST['delete'])){
        $query = mysqli_query($conn,"DELETE FROM image_gallery where image_id='$a'");
        if($query){
            echo "Record Deleted with id: $a <br>";
            // if you want to redirect to update page after updating
            header("location: admin.php");
        }
        else { echo "Record Not Deleted";}
        }



include 'layout-folder/footer.php';
?>
