<?php 
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id'])){
  header('Location:index.php');
}
$sid=$_SESSION['s_id'];

$r_id=$_GET['r_id'];

$stmt=$admin->ret("SELECT * FROM `feedback` where r_id='$r_id' ");
// $row=$stmt->fetch(PDO::FETCH_ASSOC);
// echo $row['f_message'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Goods Transport Service </title>
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
    <link href="css/stylee.css" rel="stylesheet">
    <link href="css/styyle.css" rel="stylesheet">
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
        <h1 class="display-3 text-white mb-3 animated slideInDown">Feedback</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                <li class="breadcrumb-item"><a href="requests.php">Vehicle Requests</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Feedback</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


        <div class="container-xxl py-5">
          <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Feedback</h1>
            
              <div class="card card-body" style="display:flex;flex-direction: row;flex-wrap: wrap;gap:20px;justify-content: center;">

                  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                 <?php
                    if ($stmt) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  
                      if ($row) {
                          // ✅ Feedback exists, display it
                          // echo "<p>Feedback: " . htmlspecialchars($row['f_message']) . "</p>";?>
                          <P class="text-center mb-5 wow fadeInUp"><?php echo $row['f_message'];?></P>
<?php
                      } else {
                          // ❌ No feedback found
                          echo "<p>No Feedback</p>";
                      }
                  } 
?>



                <!-- <P class="text-center mb-5 wow fadeInUp"><?php echo $row['f_message'];?></P> -->
              </div>
            </div>
          </div>
<script>
  // function yesnocheck(){
  //     if (document.getElementById('yescheck').checked) {
  //       document.getElementById('ifyes').style.visibility='hidden';
  //                       document.getElementById('ad').style.visibility='visible';

  //     }
  //     else if (document.getElementById('nocheck').checked) {
  //               document.getElementById('ifyes').style.visibility='visible';
  //                       document.getElementById('ad').style.visibility='hidden';

  //     }
  //   }
</script>
</body>
</html>
