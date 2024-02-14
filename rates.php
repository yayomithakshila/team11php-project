<?php 
 $title = "Rates page";
 include 'layout-folder/header.php';
 ?> 
        <style>
            .card {
                border-radius: 20px;
                overflow: hidden;
                opacity: 0.7;
            }
        </style>

        <div class="section text-left">
            <div class="row">
                <div class="textOnVideo col">
                    <div class="container mt-5" style="padding-top: 80px;">
                        <h3>Our Packages</h3>
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4.7 mb-4">
                                <div class="card card-large">
                                    <div class="card-body">
                                        <h2 class="card-title">Entire Villa</h2>
                                        <p class="card-text">$1500per 2months</p>
                                        <p class="card-text">Non-refundable <br>Excludes taxes and charges</p>
                                        <a href="booking.php" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-12 col-md-4 col-lg-4 mb-4">
                                <div class="card card-medium">
                                    <div class="card-body">
                                        <h2 class="card-title">Entire Villa</h2>
                                        <p class="card-text">$800per 1month</p>
                                        <p class="card-text">Non-refundable <br>Excludes taxes and charges</p>
                                        <a href="booking.php" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-12 col-md-4 col-lg-3.3 mb-4">
                                <div class="card card-small">
                                    <div class="card-body">
                                        <h2 class="card-title">Entire Villa</h2>
                                        <p class="card-text">$250per 1week</p>
                                        <p class="card-text">Non-refundable <br>Excludes taxes and charges</p>
                                        <a href="booking.php" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'layout-folder/footer.php'; ?>