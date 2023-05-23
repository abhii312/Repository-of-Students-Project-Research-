<?php

$user_id=$_GET['user_id'];

include "../shared/connection.php";

$query="delete from vendor_account where user_id='$user_id'";

$sql_status=mysqli_query($conn,$query);

if($sql_status)
{
    header('location:index.php');
}
else
{
    echo "Something went wrong";

}

?>