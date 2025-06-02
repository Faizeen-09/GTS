<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];


$r_id=$_GET['r_id'];
// $stmt1=$admin->ret("SELECT * FROM `product` where `r_id`='$r_id'");
// $row1=$stmt1->fetch(PDO::FETCH_ASSOC);

$stmt=$admin->ret("SELECT * FROM `vehicle_request` inner join `vehicle` on vehicle_request.s_id=vehicle.s_id where `r_id`='$r_id'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

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

    <script>
        function calculateAmount() {
            var kilometers = document.getElementsByName('p_km')[0].value;
            var rate = <?php echo $row['s_rate']; ?>;
            if(kilometers && !isNaN(kilometers)) {
                var amount = kilometers * rate;
                document.getElementsByName('p_amount')[0].value = amount.toFixed(2);
            } else {
                document.getElementsByName('p_amount')[0].value = "0.00";
            }
        }
    </script>
</head>

<body>
<div class="container-xxl py-5">
            <div class="container col-lg-12">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">PAYMENT</h1>
                <div class="card card-body" style="display:flex;flex-direction: row;flex-wrap: wrap;gap:20px;justify-content: center;">
                    <!-- <h5 class="text-center wow fadeInUp" data-wow-delay="0.1s">Scan & Pay</h5> -->
                    <div class="text-center container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 wow slideInUp"  data-wow-delay="0.1s">
                                <h4 class="mb-4">Scan & Pay</h4>
                                <img src="img/admin-qr.jpg" height="200px" width="200px">
                        </div> 


                                                
                                            
                                            <form method="POST" action="controller/payment.php">
                                                <div class="form-box">
                                                    <input type="hidden" name="s_id" class="form-control" aria-label="Username" value="<?php echo $sid; ?>" required>
                                                    <input type="hidden" name="r_id" class="form-control" aria-label="Username" value="<?php echo $r_id; ?>" required>
                                                    <input type="hidden" name="c_id" class="form-control" aria-label="Username" value="<?php echo $row['c_id']; ?>" required>
                                                </div>
                                                <br>
                                                <div class="form-box">
                                                    <label>Total Kilometer</label>
                                                    <input type="number" name="p_km" maxlength=6 oninput="calculateAmount()" required>
                                                </div>    
                                               
                                                <br>
                                                <div class="form-box">
                                                    <label>Payment Amount</label>
                                                    <input type="text" name="p_amount" value="0.00" readonly/>
                                                </div>    
                                                <br>
                                                <div class="form-box">
                                                    <label>Transaction Id</label>
                                                    <input   type="text" name="p_tid" placeholder="0000 0000 0000 0000 " pattern="[0-9]{12}" required>
                                                </div>  
                                                
                                                </div>
                                                <button class="btn btn-success" type="submit" name="submit" value="Insert">&nbsp;Submit</button>          
                                                </div>
                                                </form>
                                        
                                         </div>
                                </div>             
                            
                     
                </div>
           


</body>
</html>