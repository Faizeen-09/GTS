<?php 
include '../../config.php';
$admin=new Admin();
if (isset($_POST['submit'])) {
    $rid=$_POST['r_id'];
    $cid=$_POST['c_id'];
    $sid=$_POST['s_id'];
    
    $tid=$_POST['p_tid'];
    $amt=$_POST['p_amount'];
    $km=$_POST['p_km'];
    $pstatus="Received";

    $platform_fee=$amt*10/100;
    $v_amount=$amt*90/100; 
    
    // echo $rid." ".$cid." ".$sid." ".$tid." ".$amt." ".$km." ".$pstatus." ".$platform_fee." ".$v_amount;

     
        $stmt=$admin->cud("INSERT INTO `payment`( `p_date`, `r_id`, `c_id`, `s_id`, `p_tid`, `p_km`, `p_totalamt`, `p_platformamt`, `p_vamount`, `p_status`) VALUES (Now(),'$rid','$cid','$sid','$tid','$km','$amt','$platform_fee','$v_amount','$pstatus')",'saved');
        $stmt2=$admin->cud("UPDATE `vehicle_request` SET `r_updateddate`=Now(),`r_status`='Completed' WHERE `r_id`=$rid",'Updated');
        
        echo "<script>alert('Payment Successful');
        window.location='../requests.php';</script>";
    

    
  }

?>
