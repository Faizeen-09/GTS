<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['c_id']))
{
    header('Location:index.php');
}
$cid=$_SESSION['c_id'];

$stmt2=$admin->ret("SELECT * FROM `location` ");
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

        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5" style="background-image: url('img/banner-22.jpg')">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Vehicles List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                        <li class="breadcrumb-item text-white active" aria-current="page">Vehicles List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


     



        <div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Vehicles</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            
            <form method="POST" action="">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <select class="form-control" name="location" required style="color:black; width: 300px;">
                        <option value="" disabled selected>Search by Location</option>
                        <?php
                        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row2['l_name'] . "'>" . $row2['l_name'] . "</option>";
                        }
                        ?>
                    </select> 
                    <button class="btn btn-primary" type="submit" name="filter">Filter</button>
                </div>
            </form>

            <br>
            <br>
            <br>

            <?php
            if (isset($_POST['filter']) && !empty($_POST['location'])) {
                $location = $_POST['location'];
                $stmt = $admin->ret("SELECT * FROM vehicle WHERE s_location='$location'");
            } else {
                $stmt = $admin->ret("SELECT * FROM vehicle");
            }

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="../vehicle/controller/<?php echo $row['s_photo']; ?>" alt="Job-Image" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h5 class="mb-3"><?php echo $row['s_vehicle']; ?></h5>
                            <span class="text-truncate me-3">
                                <i class="fa fa-map-marker-alt gig me-2"></i>
                                <?php echo $row['s_location']; ?>
                            </span>
                            <span class="text-truncate me-3">
                                <i class="fas fa-rupee-sign gig me-2"></i>
                                <?php echo $row['s_rate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-primary" href="vehicle-detail.php?s_id=<?php echo $row['s_id']; ?>">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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