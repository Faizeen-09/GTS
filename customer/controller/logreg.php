<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['register']))
{
    $name=$_POST['c_name'];
    $phone=$_POST['c_phone'];
    $email=$_POST['c_email'];
    $address=$_POST['c_address'];
    $password=$_POST['c_password'];
    $status="registered";
    $profilepic="upload/".basename($_FILES['c_profilepic']['name']);
    move_uploaded_file($_FILES['c_profilepic']['tmp_name'],$profilepic);

    $stmt2=$admin->ret("SELECT * FROM `customers` ");
    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
    {
    if($email==$row2['c_email'])
     {
        echo "<script>alert('Account Already exist.Please Sign In');
        window.location.href='../index.php';
        </script>";
        
     }
    }
    // echo $name;
    $stmt=$admin->cud("INSERT INTO `customers`( `c_username`, `c_phone`, `c_email`, `c_password`, `c_address`, `c_photo`, `c_createddate`,  `c_status`) VALUES ('$name','$phone','$email','$password','$address','$profilepic',Now(),'$status')","Inserted");
    echo "<script>alert('Registered Successfully!Login to explore more...');
    window.location.href='../index.php';
    </script>";
    
}


if(isset($_POST['signin']))
{
    
    $email=$_POST['u_email'];
    $password=$_POST['u_password'];
    $stmt=$admin->ret("SELECT * FROM `customers` WHERE `c_email`='$email' AND `c_password`='$password'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0)
    {
        $status=$row['c_status'];
        if($status=="Approved" || $status=="Updated")
        {
        $cid=$row['c_id'];
        $_SESSION['c_id']=$cid;
        echo "<script>alert('Logged In Successfully!You are good to go...');
        window.location.href='../homepage.php';
        </script>";
        }
        else {
            echo "<script>alert('Your account has not been verified by the admin! Please try again');
            window.location.href='../index.php';
            </script>";
            }
    }
    else
    {
        echo "<script>alert('Incorrect Email or Password!Please try again...');
        window.location.href='../index.php';
        </script>";
    }
}


?>