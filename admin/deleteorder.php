<?php

$order_id=$_GET['order_id'];

include "../shared/connection.php";

$query="delete from order_manager where order_id='$order_id'";

$sql_status=mysqli_query($conn,$query);

if($sql_status)
{
    header('location:orders.php');
}
else
{
    echo "Something went wrong";

}

?>