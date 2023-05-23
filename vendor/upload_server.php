<?php

session_start();

if(isset($_SESSION['username1']))
{
    $src_path=$_FILES['imname']['tmp_name'];       //temporary storage

    $imname=$_FILES['imname']['name'];             //getting original file name

    date_default_timezone_set("Asia/kolkata");      // to set time for images

    $unique=date("YmdHis").".jpg"; // to avoid duplicate images(H-hour,i-minutes,s-second)(y-year,m-month,d-date) **(. used to concatinate in php)

    $dest_path="../image/$unique";                // destination apth

    move_uploaded_file($src_path,$dest_path);

    //  to store pdf

    $sr_path=$_FILES['pfname']['tmp_name'];       

    $pfname=$_FILES['pfname']['name']; 

    date_default_timezone_set("Asia/kolkata");      

    $unique1=date("YmdHis").".pdf"; 

    $des_path="../pdf/$unique1";               

    move_uploaded_file($sr_path,$des_path);


    $Username=$_SESSION['username1'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $details=$_POST['details'];


    $conn=new mysqli("localhost","root","","library");

    $query="INSERT INTO `product`(`name`, `details`, `price`, `impath`, `pfpath`,`Username`) 
                            VALUES ('$name','$details','$price','$dest_path','$des_path','$Username')";

    $sql_status=mysqli_query($conn,$query);

    if($sql_status)
    {
        header('location:index.php');
    }
    else
    {
        echo "Unable to upload";
    }
}
else
{
    echo "<script>
    alert('Please login to upload documents');
    window.location.href='index.php';
    </script>";

}

?>