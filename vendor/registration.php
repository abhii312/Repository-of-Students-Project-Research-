<?php
$username=$_GET['username'];
$password=$_GET['password1'];
$mobile=$_GET['mobile'];

$conn=new mysqli("localhost","root","","library");

$sql_obj=mysqli_query($conn,"select * from vendor_account where username='$username'");
$check=mysqli_fetch_array($sql_obj); // $total_rows=mysqli_num_rows($sql_obj)

if(isset($check))    // if($total_rows>0)
{
    echo "$username username already exists";
    echo "<br><a href='register.html'>try Again</a>";
    return false;
}
else
{
    $query="insert into vendor_account(username,password,mobile) values('$username','$password','$mobile')";
    $sql_result=mysqli_query($conn,$query);

}

if($sql_result)
{
    echo "Registration successful";
    echo "<br><a href='login.html'>Login here</a>";
    header('location:login.html');
}
else
{
    echo "Registration failed";

}

?>