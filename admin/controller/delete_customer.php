<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

$cid=$_GET['c_id'];
$stmt=$admin->cud("DELETE FROM `customers` WHERE `c_id`='$cid'","Deleted");
echo "<script>alert('Customer record deleted successfully!');
window.location.href='../customers.php';
</script>";




?>