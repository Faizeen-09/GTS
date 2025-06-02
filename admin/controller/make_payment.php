<?php 
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

if (isset($_POST['submit'])) {
    $pid=$_POST['p_id'];
    
    $a_tid=$_POST['a_tid'];
    $pstatus="Paid";

    
        // $stmt=$admin->cud("INSERT INTO `payment`( `p_date`, `r_id`, `c_id`, `s_id`, `p_tid`, `p_km`, `p_totalamt`, `p_platformamt`, `p_vamount`, `p_status`) VALUES (Now(),'$rid','$cid','$sid','$tid','$km','$amt','$platform_fee','$v_amount','$pstatus')",'saved');
        $stmt2=$admin->cud("UPDATE `payment` SET `admin_tid`='$a_tid',`p_status`='$pstatus' WHERE  `p_id`='$pid'",'Updated');
        
        echo "<script>alert('Payment Successful');
        window.location='../payment.php';</script>";
    

    
  }

?>
