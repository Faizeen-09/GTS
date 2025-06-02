<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];
$stmt=$admin->ret("SELECT * FROM `vehicle` WHERE `s_id`='$sid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt2=$admin->ret("SELECT * FROM `location` ");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Goods Transport Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="GigSource,Part-Time Job,Jobs for student" name="keywords">
    <meta content="Part-time job organizer for students" name="description">

    <!-- Favicon -->
    <!-- <link href="img/GS1.jpg" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"> -->
            <!-- <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"> -->
                <!-- <span class="sr-only">Loading...</span> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <div class="container-xxl py-5 bg-dark page-header mb-5" style="background-image: url('img/banner-22.jpg')">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Profile</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                    
                        <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <!-- Left Column (4 columns wide) -->
                    <div class="col-md-4">
                        <!-- Vehicle Photo Card -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="controller/<?php echo $row['s_photo']; ?>" alt="vehicle" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?php echo $row['s_vehicle']; ?></h4>
                                        <p class="text-muted font-size-sm"><?php echo $row['s_desc']; ?></p>
                                        <form method="post" action="controller/profile.php" enctype="multipart/form-data">
                                            <div class="d-flex">
                                                <div>
                                                    <input type="file" name="dp" class="form-control" required>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" name="newdp">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Driver License Card -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="controller/<?php echo $row['license']; ?>" alt="License" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h6>Driver License</h6>
                                        <form method="post" action="controller/profile.php" enctype="multipart/form-data">
                                            <div class="d-flex">
                                                <div>
                                                    <input type="file" name="license" class="form-control" required>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" name="ulicense">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Aadhar Card -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="controller/<?php echo $row['adhar']; ?>" alt="adhar" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h6>Aadhar Card</h6>
                                        <form method="post" action="controller/profile.php" enctype="multipart/form-data">
                                            <div class="d-flex">
                                                <div>
                                                    <input type="file" name="adhar" class="form-control" required>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" name="uadhar">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vehicle Insurance Card -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="controller/<?php echo $row['insurance']; ?>" alt="Insurance" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h6>Vehicle Insurance</h6>
                                        <form method="post" action="controller/profile.php" enctype="multipart/form-data">
                                            <div class="d-flex">
                                                <div>
                                                    <input type="file" name="insurance" class="form-control" required>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" name="uinsurance">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="controller/<?php echo $row['upi']; ?>" alt="QR Code" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h6>Payment QR Code</h6>
                                        <form method="post" action="controller/profile.php" enctype="multipart/form-data">
                                            <div class="d-flex">
                                                <div>
                                                    <input type="file" name="upi" class="form-control" required>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" name="uupi">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Registration Certificate Card -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="controller/<?php echo $row['rc']; ?>" alt="RC" class="rounded-circle" width="150">
                                    <h6>Registration Certificate</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column (8 columns wide) -->
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form method="post" action="controller/profile.php">  
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" value="<?php echo $row['s_username']; ?>" name="s_username" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" value="<?php echo $row['s_email']; ?>" name="s_email" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" value="<?php echo $row['s_phone']; ?>" name="s_phone" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Location</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" readonly value="<?php echo $row['s_location']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Change Location</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-control" name="s_location" required style="color:black;">
                                                <option value="" disabled selected>Select Location</option>
                                                <?php
                                                while ($row2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='" . $row2['l_name'] . "'>" . $row2['l_name'] . "</option>";
                                                }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Rate</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" value="<?php echo $row['s_rate']; ?>" name="s_rate" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">UPI ID</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" value="<?php echo $row['upi']; ?>" name="s_rate" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Vehicle</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" value="<?php echo $row['s_vehicle']; ?>" name="s_vehicle" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Description</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea class="form-control" name="s_desc" required rows="3"><?php echo $row['s_desc']; ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="s_password" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirm Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="s_confirmpassword" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" value="Edit" name="edit" class="btn btn-primary"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Start -->
        <?php 
        include 'footer.php';
        ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>