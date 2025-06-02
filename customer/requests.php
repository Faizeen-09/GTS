<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['c_id']))
{
    header('Location:index.php');
}
$cid=$_SESSION['c_id'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border gig" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5" style="background-image: url('img/banner-22.jpg')">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Vehicle Requests</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                        <li class="breadcrumb-item text-white active" aria-current="page">Vehicle Requests</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Vehicle Requests</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                   
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <?php
                            $stmt=$admin->ret("SELECT * FROM `vehicle_request` inner join `vehicle`on vehicle.s_id=vehicle_request.s_id WHERE vehicle_request.c_id='$cid' ORDER BY r_id DESC" );
                            
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <div class="vehicle-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="../vehicle/controller/<?php echo $row['s_photo']; ?>" alt="vehicle-Image" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row['s_vehicle']; ?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt gig me-2"></i><?php echo $row['s_location']; ?></span>
                                            <span class="text-truncate me-3"><i class="fas fa-rupee-sign gig me-2"></i><?php echo $row['s_rate']; ?>/-</span>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-1">
                                            
                                            <span class="text-truncate me-4"><button class="btn btn-primary" ><span style="text-transform:capitalize"><?php echo $row['r_status']; ?></span></button></span>
                                           <?php if ($row['r_status']=="Completed"){ ?>
                                            <span class="text-truncate me-3">
                                                
                                             
                                            <a href="feedback.php?r_id=<?php echo $row['r_id'];?>">
                                            <button type="button" class="btn btn-outline-dark ">Feedback</button>
                                            </a>
                                        </span>
                                            
                                            
                                           
                                           <?php } ?>
                                        </div>
                                        <div class="d-flex mb-2">
                                        <!-- <span class="text-truncate me-5"><p class="gig">Status</p></span>
                                        <span class="text-truncate me-0"><p class="gig">Feedback</p></span> -->
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


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