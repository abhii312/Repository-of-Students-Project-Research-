<?php

$cid=$_GET['cid'];

include "../shared/connection.php";

$query="delete from videos where cid='$cid'";

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