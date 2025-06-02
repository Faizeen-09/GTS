<?php
include '../../config.php';
$admin=new Admin();
$sid=$_SESSION['s_id'];
if(isset($_POST['newdp']))
{
    $profilepic="upload/".basename($_FILES['dp']['name']);
    move_uploaded_file($_FILES['dp']['tmp_name'],$profilepic);

    $stmt=$admin->cud("UPDATE `vehicle` SET `s_photo`='$profilepic' WHERE `s_id`='$sid'","Inserted");
    echo "<script>alert('Profile picture updated successfully!');
     window.location.href='../profilee.php';
    </script>";
    
}

if(isset($_POST['uinsurance']))
{
    $insurance="upload/".basename($_FILES['insurance']['name']);
    move_uploaded_file($_FILES['insurance']['tmp_name'],$insurance);

    $stmt=$admin->cud("UPDATE `vehicle` SET `insurance`='$insurance' WHERE `s_id`='$sid'","Inserted");
    echo "<script>alert('Insurance picture updated successfully!');
     window.location.href='../profilee.php';
    </script>";
    
}

if(isset($_POST['uadhar']))
{
    $adhar="upload/".basename($_FILES['adhar']['name']);
    move_uploaded_file($_FILES['adhar']['tmp_name'],$adhar);

    $stmt=$admin->cud("UPDATE `vehicle` SET `adhar`='$adhar' WHERE `s_id`='$sid'","Inserted");
    echo "<script>alert('Adhar picture updated successfully!');
     window.location.href='../profilee.php';
    </script>";
    
}

if(isset($_POST['uupi']))
{
    $upi="upload/".basename($_FILES['upi']['name']);
    move_uploaded_file($_FILES['upi']['tmp_name'],$upi);

    $stmt=$admin->cud("UPDATE `vehicle` SET `upi`='$upi' WHERE `s_id`='$sid'","Inserted");
    echo "<script>alert('QR Code updated successfully!');
     window.location.href='../profilee.php';
    </script>";
    
}

if(isset($_POST['ulicense']))
{
    $license="upload/".basename($_FILES['license']['name']);
    move_uploaded_file($_FILES['license']['tmp_name'],$license);

    $stmt=$admin->cud("UPDATE `vehicle` SET `license`='$license' WHERE `s_id`='$sid'","Inserted");
    echo "<script>alert('License picture updated successfully!');
     window.location.href='../profilee.php';
    </script>";
    
}


if(isset($_POST['edit']))
{
    $name=$_POST['s_username'];
    $phone=$_POST['s_phone'];
    $email=$_POST['s_email'];
    $location=$_POST['s_location'];
    $rate=$_POST['s_rate'];
    $vehicle=$_POST['s_vehicle'];
    $desc=$_POST['s_desc'];
    $password=$_POST['s_password'];
    $cpassword=$_POST['s_confirmpassword'];
    $status="Updated";

    $stmt2=$admin->ret("SELECT * FROM `vehicle` WHERE `s_id`='$sid'");
    $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
    


    if($password==$cpassword)
    {
        if($password=="" || $cpassword=="")
        {
            $stmt=$admin->cud("UPDATE `vehicle` SET `s_username`='$name',`s_phone`='$phone',`s_email`='$email',`s_location`='$location',`s_rate`='$rate',`s_vehicle`='$vehicle',`s_desc`='$desc',`s_updateddate`=Now(),`s_status`='$status' WHERE `s_id`='$sid'","updated");
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../profile.php';
         </script>";
        }
        else{

        
            $stmt=$admin->cud("UPDATE `vehicle` SET `s_username`='$name',`s_phone`='$phone',`s_email`='$email',`s_location`='$location',`s_rate`='$rate',`s_vehicle`='$vehicle',`s_desc`='$desc',`s_password`='$password',`s_updateddate`=Now(),`s_status`='$status' WHERE `s_id`='$sid'","updated");
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../profile.php';
         </script>";
        }
    }
    else
    {
        echo "<script>alert('Password is not matching!');
        window.location.href='../profile.php';
        </script>";
    }
}




?>