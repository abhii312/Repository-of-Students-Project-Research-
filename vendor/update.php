<?php

include '../shared/connection.php';

$pid=$_GET['pid'];

$sql="select * from product where pid='$pid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$details=$row['details'];
$price=$row['price'];
$impath=$row['impath'];

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $details=$_POST['details'];
    $price=$_POST['price'];
 
        $src_path=$_FILES['imname']['tmp_name'];     
        $imname=$_FILES['imname']['name'];             
        date_default_timezone_set("Asia/kolkata");     
        $unique=date("YmdHis").".jpg"; 
        $dest_path="../image/$unique";                
    
        move_uploaded_file($src_path,$dest_path);

        
        $sr_path2=$_FILES['pfname']['tmp_name'];       

        $pfname=$_FILES['pfname']['name']; 

        date_default_timezone_set("Asia/kolkata");      

        $unique2=date("YmdHis").".pdf"; 

        $des_path2="../pdf/$unique2";               

        move_uploaded_file($sr_path2,$des_path2);

        $sql="update product set name='$name',price='$price',details='$details',impath='$dest_path',vpath='$dest_path2' where pid='$pid'";

        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            echo "<script>alert('data inserted successfully')</script>";
            header('location:view.php');
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
            
            <h3 class="text-center">Update Product</h3>
            <input type="text" class="form-control mt-3" name="name" placeholder="Enter Prodcut Name" value="<?php echo $name; ?>" required>
            <input type="text" class="form-control mt-3" name="price" required placeholder="Enter Product Price"  value="<?php echo $price; ?>">
            <textarea  class="form-control mt-3" rows="8" name="details" cols="50" placeholder="Product Description"><?php echo $details; ?></textarea></br>
            
            <h5>Update Cover Photo here</h5>
            <input hidden accept=".jpg" type="file" class="form-control mt-3" id="item_img" name="imname">  <!--only for images use (accept=".jpg")-->
            <input hidden name='old_image' type="file" value="<?php echo $impath; ?>">

            
            <label for="item_img">
                <img src="<?php echo $impath; ?>" alt="">
            </label></br>

            <h5>Upload Pdf Here</h5>
            <input accept=".pdf" type="file" class="form-control mt-3" name="pfname">

            <input type="submit" value="Update" name="update" class="mt-3 btn btn-success">  
        </form> 
    </div> 
</body>
</html>