<?php
include '../../config.php';
$admin=new Admin();
$id=$_SESSION['s_id'];
// $jid=$_GET['j_id'];
if(isset($_POST['update']))
{
   
    $r_id=$_POST['r_id'];
    $status=$_POST['status'];

    // $stmt=$admin->ret("SELECT * FROM `vehicle_request` WHERE `r_id`='$r_id'");
    // $row=$stmt->fetch(PDO::FETCH_ASSOC);
     
    // $cid=$row['c_id'];


    $stmt=$admin->cud("UPDATE `vehicle_request` SET `r_updateddate`=Now(),`r_status`='$status' WHERE `r_id`='$r_id' ","updated");
    echo "<script>alert('Status updated successfully!');
    window.location.href='../requests.php';
    </script>";
    
}
