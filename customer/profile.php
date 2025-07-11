<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['c_id']))
{
    header('Location:index.php');
}
$cid=$_SESSION['c_id'];
$stmt=$admin->ret("SELECT * FROM `customers` WHERE `c_id`='$cid'");
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
        <div class="row g-5 align-items-center">
            
        <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                     <img src="controller/<?php echo $row['c_photo']; ?>" alt="customers" class="rounded-circle" width="150">
                      <div class="mt-3">
                       <h4> <?php echo $row['c_username'];   ?></h4>
                       <p class="text-muted font-size-sm"><?php echo $row['c_email'];   ?></p>
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
              </div>
            

            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-center">
                    
                <!-- <div class="card p-3 m-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex align-items-center align-self-start w-100 justify-content-between">
                          <?php  

                          // $p=$admin->ret("SELECT SUM(`p_customersamt`) FROM `payment` inner join `client_order` on client_order.o_id=payment.o_id inner join `product` on product.pr_id=client_order.pr_id inner join `customers` on customers.c_id=product.c_id WHERE product.c_id='$cid'");
                          // $q=$p->fetch(PDO::FETCH_ASSOC);
                          // $r = implode($q);

                          // $x=$admin->ret("SELECT SUM(`p_customersamt`) FROM `payment` inner join `client_order` on client_order.o_id=payment.o_id inner join `product` on product.pr_id=client_order.pr_id inner join `customers` on customers.c_id=product.c_id WHERE product.c_id='$cid' AND `o_date`=CURDATE()");
                          // $y=$x->fetch(PDO::FETCH_ASSOC);
                          // $z = implode($y);
                      
                      
                      
                      ?>
                          <h3 class="mb-0"><?php 
                          // echo $r; ?></h3>
                           <p class="text-success ml-2 mb-0 font-weight-medium m-3">+<?php 
                          //  echo $z; ?> | Today</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Income</h6>

                  </div>
                </div>  
                <div class="card p-3 m-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex align-items-center align-self-start w-100 justify-content-between">
                          <?php  

                      //     $x=$admin->ret("SELECT SUM(`p_customersamt`) FROM `payment` inner join `client_order` on client_order.o_id=payment.o_id inner join `product` on product.pr_id=client_order.pr_id inner join `customers` on customers.c_id=product.c_id WHERE product.c_id='$cid' AND `o_date`=CURDATE()");
                      //     $y=$x->fetch(PDO::FETCH_ASSOC);
                      //     $z = implode($y);

                      //    $stmts = $admin -> ret("SELECT COUNT(*) FROM `client_order` inner join `product` on product.pr_id=client_order.pr_id inner join `customers` on customers.c_id=product.c_id WHERE product.c_id='$cid'");
                      //     $rows2 = $stmts -> fetch(PDO::FETCH_ASSOC);
                      //     $order21 = implode($rows2);

                      // $stmts = $admin -> ret("SELECT COUNT(*) FROM `client_order` inner join `product` on product.pr_id=client_order.pr_id inner join `customers` on customers.c_id=product.c_id WHERE product.c_id='$cid' AND `o_date`=CURDATE()");
                      //     $rows2 = $stmts -> fetch(PDO::FETCH_ASSOC);
                      //     $order212 = implode($rows2);
                      
                                            
                      ?>
                          <h3 class="mb-0"><?php 
                          // echo $order21; ?></h3>
                           <p class="text-success ml-2 mb-0 font-weight-medium m-3">+<?php 
                          //  echo $order212; ?> | Today</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Orders</h6>

                  </div>
                </div>     -->
                  </div>
                </div>
              </div>


            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-body">
                <form method="post" action="controller/profile.php" >  
                  <div class="row">
              
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" value="<?php echo $row['c_username']; ?>" name="c_name" minlength="3" maxlength="20" class="form-control">
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="email" value="<?php echo $row['c_email']; ?>" name="c_email" class="form-control">
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" value="<?php echo $row['c_phone']; ?>" name="c_phone" class="form-control" pattern="\d{10}">
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6> 
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" value="<?php echo $row['c_address']; ?>" name="c_address" class="form-control" minlength="8" maxlength="100">
                    </div>
                  </div>

                 
                  <hr> 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">New Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text"  name="c_password" class="form-control" minlength="8" maxlength="100">
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Confirm Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text"  name="c_confirmpassword" class="form-control">
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a> -->
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