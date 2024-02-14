<?php
@ob_start();
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title;?>
            </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <header class="header">
                    <a href="" class="logo"><img src="image/logo.png" alt="Villa King Coco"></a>
                    <nav class="navbar">
                        <a href="index.php">Home</a>
                        <a href="rates.php">Rates</a>
                        <a href="location.php">Location</a>
                        <a href="facilities.php">Facilities</a>
                        <a href="gallery.php">Gallery</a>
                        <a href="contactus.php">Contact Us</a>
                        <a href="reviews.php">Reviews</a>

                        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="userAdminDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
            </button>
            <div class="dropdown-menu" aria-labelledby="userAdminDropdown">
                <a class="dropdown-item" href="login.php">User Login</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="admin_login.php">Admin Login</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">logout</a>
            </div>
        </div>
    </nav>
 
                    </nav>
                    <h6><?php 
                    if(isset($_SESSION['first_name'])){
                        
                        echo $_SESSION['first_name'];
                         
                        }
                    
                      ?></h6>
                </header>
            </div>
        </div>


        