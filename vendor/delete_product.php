<?php

$pid=$_GET['pid'];

include "../shared/connection.php";

$query="delete from product where pid='$pid'";

$sql_status=mysqli_query($conn,$query);

if($sql_status)
{
    header('location:view.php');
}
else
{
    echo "Something went wrong";

}
?>