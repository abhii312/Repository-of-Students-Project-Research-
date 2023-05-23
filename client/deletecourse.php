<?php

$cid=$_GET['cid'];

include "../shared/connection.php";

$query="delete from enrolled_videos where cid='$cid'";

$sql_status=mysqli_query($conn,$query);

if($sql_status)
{
    header('location:mycourse.php');
}
else
{
    echo "Something went wrong";

}
?>