<?php

include '../shared/connection.php';

$user_id=$_GET['user_id'];

$sql="select * from vendor_account where user_id='$user_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$username=$row['username'];
$password=$row['password'];
$mobile=$row['mobile'];


if(isset($_POST['update']))
{
    $username=$_POST['username'];
    $mobile=$_POST['mobile'];

    $sql="update vendor_account set username='$username',mobile='$mobile' where user_id='$user_id'";

    $result=mysqli_query($conn,$sql);
    

    if($result)
    {
        echo '<script>alert("data inserted successfully")</script>';
        header('location:index.php');
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
<div class="d-flex justify-content-center align-items-center vh-100">

<form action='' class="bg-warning p-4 text-center" method='POST'>
    <h1>Update Vendor details</h1>
    <input type="text" name="username" class="form-control mt-2" placeholder="Enter Username" id="username" value="<?php echo $username; ?>" required>
    <input type="password" name="password1" class="form-control mt-2" placeholder="Enter password" id="password1" value="<?php echo $password; ?>" required >
    <input type="password" name="password2" class="form-control mt-2" placeholder="confirm password" id="password2" value="<?php echo $password; ?>" required>
    <input type="text" name="mobile" id="mobile" class="form-control mt-2" placeholder="Enter Mobile number" value="<?php echo $mobile; ?>" maxlength="10" minlength="10">

    <input class="btn btn-danger mt-3" type="submit" name="update" value="Update">

</form> 
</div>

    
</body>
</html>