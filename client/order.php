<?php

session_start();

include '../shared/connection.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
        $username=$_SESSION['username'];
        $query="INSERT INTO `order_manager`(`username`,`Full_Name`, `Phone_Number`, `Address`, `Payment_Mode`) VALUES ('$username','$_POST[fullname]','$_POST[phonenumber]','$_POST[address]','$_POST[paymode]')";
        if(mysqli_query($conn,$query))
        {
            $order_id=mysqli_insert_id($conn);
            $query1="INSERT INTO `user_order`(`order_id`,`username`,`pid`,`Item_name`, `Price`) VALUES (?,?,?,?,?)";
            $stmt=mysqli_prepare($conn,$query1);
            if($stmt)
            {
                $username=$_SESSION['username'];
                mysqli_stmt_bind_param($stmt,"isisi",$order_id,$username,$pid,$name,$price);
                $local_cart=$_SESSION['cart'];

                $pids=implode(",",$local_cart);

                $query="select * from product where pid in ($pids)";

                $mysqli_obj=mysqli_query($conn,$query);

                while($row_cart=mysqli_fetch_array($mysqli_obj))
                {
                    $pid=$row_cart['pid'];
                    $name=$row_cart['name'];
                    $price=$row_cart['price'];
                    mysqli_stmt_execute($stmt);

                }
                 echo "<a href='vieworder.php?order_id=$order_id'></a>";
            
                    unset($_SESSION['cart']);
                    echo "<script>
                        alert('Order Placed');
                        window.location.href='index.php';
                        </script>";                    
            }   
                
        }
        else
        {
            echo "<script>
                alert('Query Error');
                window.location.href='index.php';
                </script>";

        }
    }
}

?>