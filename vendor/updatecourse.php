<?php

include '../shared/connection.php';

$cid=$_GET['cid'];

$sql="select * from videos where cid='$cid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['c_name'];
$details=$row['details'];
$price=$row['price'];
$cimpath=$row['cimpath'];
$vpath=$row['vpath'];

if(isset($_POST['update']))
{
        $name=$_POST['name'];
        $details=$_POST['details'];
        $price=$_POST['price'];

        $src_path1=$_FILES['cimname']['tmp_name'];       //temporary storage

        $cimname=$_FILES['cimname']['name'];             //getting original file name

        date_default_timezone_set("Asia/kolkata");      // to set time for images

        $unique1=date("YmdHis").".jpg"; // to avoid duplicate images(H-hour,i-minutes,s-second)(y-year,m-month,d-date) **(. used to concatinate in php)

        $dest_path1="../cover_image/$unique1";                // destination apth

        move_uploaded_file($src_path1,$dest_path1);
    
        $src_path=$_FILES['imname']['tmp_name'];       //temporary storage

        $imname=$_FILES['imname']['name'];             //getting original file name

        date_default_timezone_set("Asia/kolkata");      // to set time for images

        $unique=date("YmdHis").".mp4"; // to avoid duplicate images(H-hour,i-minutes,s-second)(y-year,m-month,d-date) **(. used to concatinate in php)

        $dest_path="../videos/$unique";                // destination apth

        move_uploaded_file($src_path,$dest_path);


        $sql="update videos set c_name='$name',price='$price',details='$details',cimpath='$dest_path1',vpath='$dest_path' where cid='$cid'";

        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            echo "<script>alert('data inserted successfully')</script>";
            header('location:viewcourse.php');
        }
        else
        {
            echo "Error in inserting data";
    
        }

}
   

    
   

?>

<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        img
        {
            width:200px;
            height:100px;
        }
    </style>

</head>
<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <form enctype="multipart/form-data" method="post" action="" class="bg-warning p-3 text-center">
            
            <h3 class="text-center">Update Course Video</h3>
            <input type="text" class="form-control mt-3" name="name" placeholder="Enter Prodcut Name" value="<?php echo $name; ?>" required>
            <input type="text" class="form-control mt-3" name="price" required placeholder="Enter Product Price"  value="<?php echo $price; ?>">
            <textarea  class="form-control mt-3" rows="8" name="details" cols="50" placeholder="Product Description"><?php echo $details; ?></textarea></br>

            <h5>Update Cover Photo here</h5>
            <input hidden accept=".jpg,.png" type="file" class="form-control mt-3" id="item_img" name="cimname">  <!--only for images use (accept=".jpg")-->
            <input hidden name='old_image' type="file" value="<?php echo $cimpath; ?>">

            
            <label for="item_img">
                <img src="<?php echo $cimpath; ?>" alt="">
            </label></br>

            <h5>Upload Update video Here</h5>
            <input type="file" accept="video/mp4,video/x-m4v,video/*" id="file" class="form-control mt-3"  name="imname"></br>  
            <input type="submit" value="Update" name="update" class="mt-3 btn btn-success">  
        </form> 
    </div> 
</body>
</html>