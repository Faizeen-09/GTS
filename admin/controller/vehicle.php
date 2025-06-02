<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['approve']))
{
    $sid=$_POST['sid'];
    $status="Approved";
    $stmt=$admin->cud("UPDATE `vehicle` SET `s_status`='$status' WHERE `s_id`='$sid'","Updated");

    echo "<script>alert('Approved Successfully!');
    window.location.href='../vehicles.php';
    </script>";


}

if(isset($_POST['reject']))
{

    $sid=$_POST['sid'];
    $status="Rejected";
    $stmt=$admin->cud("UPDATE `vehicle` SET `s_status`='$status' WHERE `s_id`='$sid'","Updated");

    echo "<script>alert('Rejected Successfully!');
    window.location.href='../vehicles.php';
    </script>";
}



?>