<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['submit']))
{
    $name=$_POST['s_name'];
    $phone=$_POST['s_phone'];
    $email=$_POST['s_email'];
    $location=$_POST['s_location'];
    $password=$_POST['s_password'];
    $vehicle=$_POST['s_vehicle'];
    $rate=$_POST['s_rate'];
    // $upi=$_POST['s_upi'];
    $desc=$_POST['s_desc'];
    $status="registered";
    
    $photo="upload/".basename($_FILES['s_photo']['name']);
    move_uploaded_file($_FILES['s_photo']['tmp_name'],$photo);

    $rc="upload/".basename($_FILES['s_rc']['name']);
    move_uploaded_file($_FILES['s_rc']['tmp_name'],$rc);

    $insurance="upload/".basename($_FILES['s_insurance']['name']);
    move_uploaded_file($_FILES['s_insurance']['tmp_name'],$insurance);

    $license="upload/".basename($_FILES['s_license']['name']);
    move_uploaded_file($_FILES['s_license']['tmp_name'],$license);

    $adhar="upload/".basename($_FILES['s_adhar']['name']);
    move_uploaded_file($_FILES['s_adhar']['tmp_name'],$adhar);

    $upi="upload/".basename($_FILES['s_upi']['name']);
    move_uploaded_file($_FILES['s_upi']['tmp_name'],$upi);

    $stmt2=$admin->ret("SELECT * FROM `vehicle` ");
    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
    {
    if($email==$row2['s_email'])
     {
        echo "<script>alert('Account Already exist.Please Sign In');
        window.location.href='../index.php' ;
        </script>";
        
     }
    }

    $stmt=$admin->cud("INSERT INTO `vehicle`(`s_username`, `s_phone`, `s_email`, `s_password`, `s_location`, `s_vehicle`, `s_rate`, `s_desc`,`s_photo`, `s_createddate`, `s_status`, `rc`, `insurance`, `license`, `adhar`,`upi`) VALUES ('$name','$phone','$email','$password','$location','$vehicle','$rate','$desc','$photo',Now(),'$status','$rc','$insurance','$license','$adhar','$upi')","Inserted");
    echo "<script>alert('Registered successfully! Login to explore more');
    window.location.href='../index.php';
    </script>";
    
}

if(isset($_POST['signin']))
{
    $email=$_POST['u_email'];
    $password=$_POST['u_password'];
    $stmt=$admin->ret("SELECT * FROM `vehicle` WHERE `s_email`='$email' AND `s_password`='$password'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0)
    {
        $status=$row['s_status'];
        if($status=="Approved" || $status=="Updated")
        {
            $sid=$row['s_id'];
            $_SESSION['s_id']=$sid;
            // print_r($_SESSION);

            echo "<script>alert('Logged In Successfully! You are good to go..');
            window.location='../homepage.php';
            </script>";
            
        }
        else 
        {
            echo "<script>alert('Your account has not been verified by the admin! Please try again later');
            window.location.href='../index.php';
            </script>";
        }
    }
    else
    {
        echo "<script>alert('Incorrect Email or Password!Please Try Again');
        window.location.href='../index.php';
        </script>";
    }
}



?>