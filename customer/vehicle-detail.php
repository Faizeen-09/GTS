<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['c_id']))
{
    header('Location:index.php');
}
$cid=$_SESSION['c_id'];

$sid=$_GET['s_id'];

$stmt=$admin->ret("SELECT * FROM `vehicle` where `s_id`='$sid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

// $cid=$row['c_id'];
// $stmt2=$admin->ret("SELECT * FROM `client` where `c_id`='$cid'");
// $row2=$stmt2->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Goods Transport Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border gig" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5" style="background-image: url('img/banner-22.jpg')">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Vehicle Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="vehicle-list.php">Vehicle List</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Vehicle Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Vehicle Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="../vehicle/controller/<?php echo $row['s_photo']; ?>" alt="" style="width: 150px; height: 150px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?php echo $row['s_vehicle']; ?></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt gig me-2"></i><?php echo $row['s_location']; ?></span>
                                <!-- <span class="text-truncate me-3"><i class="far fa-clock gig me-2"></i><?php echo $row['s_businesshour']; ?></span> -->
                                <span class="text-truncate me-0"><i class="fas fa-rupee-sign gig me-2"></i><?php echo $row['s_rate']; ?>/-</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Vehicle Description</h4>
                            <p><?php echo $row['s_desc']; ?></p>
                            <!-- <h4 class="mb-3">Responsibility</h4>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right gig me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Diam diam stet erat no est est</li>
                            </ul> -->
                            
                        </div>
        
                        <div class="">
                            <h4 class="mb-4">Send Booking Request</h4>
                            <form method="post" action="controller/send-request.php">
                                <div class="row g-3">
                    
                                <div class="col-12 col-sm-6">
                                    <label for="from" class="mt-3">From Location</label>
                                    <input type="text" class="form-control" name="from" id="from" minlength=4 required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="to" class="mt-3">To Location</label>
                                    <input type="text" class="form-control" name="to" id="to" minlength=4 required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="to" class="mt-3">Booking Date</label>
                                    <input type="date" class="form-control" name="date"  min="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="col-12">
                                        <input type="hidden" name="cid" id=""  value="<?php echo $cid; ?>">
                                        <input type="hidden" name="sid" id=""  value="<?php echo $sid; ?>">
                                        <button class="btn btn-primary w-25" name="apply"  type="submit" onclick="return confirm('Are you sure you want to send a request?')">Send Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Vehicle Summary</h4>
                            <p><i class="fa fa-angle-right gig me-2"></i><b>Vehicle:</b> <?php echo $row['s_vehicle']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i><b>Location:</b> <?php echo $row['s_location']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i><b>Vehicle Provider:</b> <?php echo $row['s_username']; ?></p>
                            <p><i class="fa fa-angle-right gig me-2"></i><b>Phone No.:</b><?php echo $row['s_phone']; ?></p>
                            <p><i class="fa fa-angle-right gig me-2"></i><b>Email:</b> <?php echo $row['s_email']; ?></p>
                            <p><i class="fa fa-angle-right gig me-2"></i><b>Rate:</b> <?php echo $row['s_rate']; ?>/-</p>
                            <!-- <p class="m-0"><i class="fa fa-angle-right gig me-2"></i>Date Line: 01 Jan, 2045</p> -->
                        </div>
                        <!-- <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Client Detail</h4>
                           
                            <p><i class="fa fa-angle-right gig me-2"></i>Client Name: <?php echo $row2['c_name']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Email: <?php echo $row2['c_email']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Address: <?php echo $row2['c_address'],' ',$row2['c_city']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Phone No.: <?php echo $row2['c_phone']; ?> </p>

                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Vehicle Detail End -->


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