<?php

include '../shared/connection.php';

$order_id=$_GET['order_id'];

$sql="select * from order_manager where order_id='$order_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$Full_Name=$row['Full_Name'];
$Phone_Number=$row['Phone_Number'];
$Address=$row['Address'];
$Payment_Mode=$row['Payment_Mode'];


if(isset($_POST['update']))
{
    $Full_Name=$_POST['Full_Name'];
    $Phone_Number=$_POST['Phone_Number'];
    $Address=$_POST['Address'];
    $Payment_Mode=$_POST['Payment_Mode'];

    $sql="update order_manager set Full_Name='$Full_Name',Phone_Number='$Phone_Number',Address='$Address',Payment_Mode='$Payment_Mode' where order_id='$order_id'";

    $result=mysqli_query($conn,$sql);
    

    if($result)
    {
        echo '<script>alert("data inserted successfully")</script>';
        header('location:orders.php');
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
        .error{
            font-size:15px;
            color:red;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100 p-4 ml-3">
    <form action="" class='bg-warning p-4 text-center' method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="Full_Name" class="form-control mt-2" value="<?php echo $Full_Name; ?>" required>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="Phone_Number" class="form-control mt-2" value="<?php echo $Phone_Number; ?>" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="Address" class="form-control mt-2" value="<?php echo $Address; ?>" required>
            </div>
            <div class="form-check">
                <input class="form-check-input mt-2" name="Payment_Mode" type="radio" value="COD" value="<?php echo $Payment_Mode; ?>" id="flexRadioDefault">
                <label class="form-check-label mt-2" for="flexRadioDefault">Cash On Delivery</labe>
            </div>
            <button  class="btn btn-primary" type="submit" name="update" value="Update">Update</button>
        </form>
</div>

    
</body>
</html>