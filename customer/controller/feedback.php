<?php
include '../../config.php';
$admin=new Admin();

// $rid=$_GET['r_id'];
if(isset($_POST['postj']))
{
    $feedback=$_POST['feedback'];
    // $cid=$_POST['cid'];
    $rid=$_POST['rid'];
    // echo $rid;
    $stmt=$admin->cud("INSERT INTO `feedback`( `f_date`, `r_id`, `f_message`) VALUES (Now(),'$rid','$feedback')","Inserted");
    echo "<script>alert('Feedback Sent Successfully');
     window.location.href='../requests.php';
    </script>";
    
}


?>