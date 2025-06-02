<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];
$rid=$_GET['r_id'];
$stmt=$admin->ret("SELECT * FROM `vehicle_request` inner join `customers` on customers.c_id=vehicle_request.c_id WHERE `r_id`='$rid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Goods Transport Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="GigSource,Part-Time Job,Jobs for customers" name="keywords">
    <meta content="Part-time job organizer for customerss" name="description">

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
 <div class="container-xxl py-5 bg-dark page-header mb-5" style="background-image: url('img/banner-22.jpg')">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Customer Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="job-list.php">Requests</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Customer Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    
                <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../customer/controller/<?php echo $row['c_photo']; ?>" alt="" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4> <?php echo $row['c_username'];   ?></h4>
                      <p class="text-muted font-size-sm"><?php echo $row['c_email'];   ?></p>
                      <form method="post" action="controller/repair-status.php" >
                        
                      <div class="d-flex">
                        <div>
                        <select name="status" class="form-control" required>
                            <option hidden>Update Status</option>
                            <option value="Confirmed">Confirm</option>
                            <option value="Not Available">Not Available</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Picked Up">Picked Up</option>
                            <option value="Dropped">Dropped</option>
                            <!-- <option value="Completed">Completed</option> -->
                        </select>
                        <input type="hidden" name="r_id" value="<?php echo $row['r_id'];   ?>">
                        </div>
                        <div>
                        <button class="btn btn-primary" name="update">Update</button>
                        </div>
                      </div>
                      </form>
                      
                    </div>
                  </div>
                </div>
              </div>
                 
            </div>          
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <form  >  
                  <div class="row">
                    <div class="col-sm-3">
                    
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" value="<?php echo $row['c_username']; ?>" readonly name="c_name" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text"value="<?php echo $row['c_email'];   ?>" readonly name="c_email" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text"value="<?php echo $row['c_phone'];   ?>" readonly name="c_phone" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                  
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text"value="<?php echo $row['c_address'];   ?>"  name="c_address" class="form-control" readonly>
                    </div>
                  </div>   
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Booking Location</h6>
                    </div>
                  </div>
<br>
                  <div class="row">
                  
                    <div class="col-sm-3">
                      <h6 class="mb-0">From</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text"value="<?php echo $row['from'];   ?>"  name="c_address" class="form-control" readonly>
                    </div>
                  </div>       
                  
                  <br>
                  <div class="row">
                  
                    <div class="col-sm-3">
                      <h6 class="mb-0">To</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text"value="<?php echo $row['to'];   ?>"  name="c_address" class="form-control" readonly>
                    </div>
                  </div>   

                </div>
              </div>

              
</form>
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