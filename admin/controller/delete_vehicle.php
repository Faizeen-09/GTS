<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

$sid=$_GET['s_id'];
$stmt=$admin->cud("DELETE FROM `vehicle` WHERE `s_id`='$sid'","Deleted");
echo "<script>alert('Vehicle record deleted successfully!');
window.location.href='../vehicles.php';
</script>";




?>