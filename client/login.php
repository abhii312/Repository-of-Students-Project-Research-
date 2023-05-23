<?php

session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$conn=new mysqli("localhost","root","","library");

$sql_obj=mysqli_query($conn,"select * from account where username='$username' and password='$password'");
$total_rows=mysqli_num_rows($sql_obj);

if($total_rows==0)
{
    echo "<script>
            alert('Invalid Username or Password');
            window.location.href='login.html';
        </script>";
    $_SESSION['login_status']=false;
    die;
}

echo "Login Success";
$_SESSION['login_status']=true;
$_SESSION['username']=$username;
header("location:index.php");

?>