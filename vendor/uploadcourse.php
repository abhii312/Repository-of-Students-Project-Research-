<?php

session_start();

if(isset($_SESSION['username1']))
{
    $src_path1=$_FILES['cimname']['tmp_name'];       //temporary storage

    $cimname=$_FILES['cimname']['name'];             //getting original file name

    date_default_timezone_set("Asia/kolkata");      // to set time for images

    $unique1=date("YmdHis").".jpg"; // to avoid duplicate images(H-hour,i-minutes,s-second)(y-year,m-month,d-date) **(. used to concatinate in php)

    $dest_path1="../cover_image/$unique1";                // destination apth

    move_uploaded_file($src_path1,$dest_path1);

    // for uploading video
    
    $src_path=$_FILES['imname']['tmp_name'];       //temporary storage

    $imname=$_FILES['imname']['name'];             //getting original file name

    date_default_timezone_set("Asia/kolkata");      // to set time for images

    $unique=date("YmdHis").".mp4"; // to avoid duplicate images(H-hour,i-minutes,s-second)(y-year,m-month,d-date) **(. used to concatinate in php)

    $dest_path="../videos/$unique";                // destination apth

    move_uploaded_file($src_path,$dest_path);

    $username1=$_SESSION['username1'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $details=$_POST['details'];

    $conn=new mysqli("localhost","root","","library");

    $query="insert into videos(c_name,price,details,cimpath,vpath,username) values('$name','$price','$details','$dest_path1','$dest_path','$username1')";

    $sql_status=mysqli_query($conn,$query);

    if($sql_status)
    {
        header('location:viewcourse.php');
    }
    else
    {
        echo "Unable to upload";
    }
}
else
{
    echo "<script>
    alert('Please login to upload Videos');
    window.location.href='index.php';
    </script>";
}

?>

