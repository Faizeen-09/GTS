<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['Approve']))
{
    $cid=$_POST['cid'];
    $status="Approved";
    $stmt=$admin->cud("UPDATE `customers` SET `c_status`='$status' WHERE `c_id`='$cid'","Updated");

    echo "<script>alert('Approved Successfully!');
    window.location.href='../customers.php';
    </script>";


}

if(isset($_POST['Reject']))
{

    $cid=$_POST['cid'];
    $status="Rejected";
    $stmt=$admin->cud("UPDATE `customers` SET `c_status`='$status' WHERE `c_id`='$cid'","Updated");

    echo "<script>alert('Rejected Successfully!');
    window.location.href='../customers.php';
    </script>";
}



?>