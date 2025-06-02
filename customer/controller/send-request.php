<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['apply']))
{
        $sid=$_POST['sid'];
        $cid=$_POST['cid'];
        $from=$_POST['from'];
        $to=$_POST['to'];
        $date=$_POST['date'];
        $status="Requested";

        $stmt=$admin->cud("INSERT INTO `vehicle_request`(`from`,`to`, `s_id`, `c_id`, `r_posteddate`, `r_status`,`date`) VALUES ('$from','$to','$sid','$cid',Now(),'$status','$date')","Inserted");
        echo "<script>alert('Requested Successfully');
        window.location.href='../vehicle-list.php';
        </script>";


}

?>