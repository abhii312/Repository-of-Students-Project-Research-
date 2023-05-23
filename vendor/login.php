<?php

session_start();

$username1=$_POST['username'];
$password=$_POST['password'];

$conn=new mysqli("localhost","root","","library");

$sql_obj=mysqli_query($conn,"select * from vendor_account where username='$username1' and password='$password'");
$total_rows=mysqli_num_rows($sql_obj);

if($total_rows==0)
{
    echo "<h1>Invalid credentails</h1>";
    $_SESSION['login_status']=false;
    die;
}

echo "Login Success";
$_SESSION['login_status']=true;
$_SESSION['username1']=$username1;
header("location:index.php");

?>