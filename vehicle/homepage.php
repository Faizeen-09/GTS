<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];

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
            <!-- <div class="spinner-border gig" style="width: 3rem; height: 3rem;" role="status"> -->
                <!-- <span class="sr-only">Loading...</span> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/banner-2.jpg" alt="" >
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Maximize Your Vehicle’s Earnings </h1>
                                    <!-- <p class="fs-5 fw-medium text-white mb-4 pb-2">Find The Perfect Job That You Deserved.Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p> -->
                                    <a href="requests.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">View Booking Requests</a>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/HandShake (1).jpg" alt="" style="height:760px">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Homemade Products That You Are Looking For. </h1>
                                    <a href="product-list.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Product</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- Carousel End -->



        


       <!-- About Start(Client) -->
       <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">We Help Vehicle Owners Connect with Customers</h1>
                        <p class="mb-4">Looking to rent out your transport vehicle? We connect you with genuine customers who need vehicles for their goods transport needs. Our platform makes it easy to get rental requests and grow your business.</p>
                        <p><i class="fa fa-check gig me-3"></i>List your vehicle with details </p>
                        <p><i class="fa fa-check gig me-3"></i>Receive rental requests from nearby customers</p>
                        <p><i class="fa fa-check gig me-3"></i>Accept bookings that fit your schedule</p>
                        <p><i class="fa fa-check gig me-3"></i>Manage all rentals through the website</p>
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="img/banner-3.jpg" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="img/banner-4.jpg" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="img/22.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

           <!-- Testimonial Start -->
        <!-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Clients Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x gig mb-3"></i>
                        <p>This website made finding a repair shop so easy! I quickly located a trusted service provider near me and got my phone fixed in no time.easy.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Sam</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x gig mb-3"></i>
                        <p>I love how convenient this platform is. I didn’t have to visit multiple stores—just submitted my request and got the best repair options instantly!</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">John</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x gig mb-3"></i>
                        <p>Easy to find trusted repair centers nearby.Saved me time by connecting me directly with service providers.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Tom</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x gig mb-3"></i>
                        <p>Found expert technicians for my phone easily. A convenient platform for hassle-free mobile repairs.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Lucy</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Testimonial End -->
        

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