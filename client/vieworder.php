<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <script>
    </script>
</body>
</html>
<?php

include "menu.php";

if(isset($_SESSION['username']))
{
    $username=$_SESSION['username']; 

    include_once "../shared/connection.php";

    $query="select * from user_order Natural JOIN order_manager where username='$username'";

    $result=mysqli_query($conn,$query);

   

   

    if(mysqli_num_rows($result)>0){
        
        echo "<div class='d-flex justify-content-center align-items-center table table-lg mt-5 p-1'>
                        <table style='width:50%;mt-3' border='2'>
                                    <tr class='bg-dark text-white'>
                                        <th>Item Name</th>  
                                        <th>Price</th> 
                                        <th>Full_Name</th>
                                        <th>Phone_Number</th>
                                        <th>Address</th>
                                        <th>Payment_mode</th>                 
                                    </tr>
                </div>";

        while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td><center>".$row["Item_name"]."</center></td>";
                echo "<td><center>".$row["Price"]."</center></td>";
                echo "<td><center>".$row["Full_Name"]."</center></td>";
                echo "<td><center>".$row["Phone_Number"]."</center></td>";
                echo "<td><center>".$row["Address"]."</center></td>";
                echo "<td><center>".$row["Payment_Mode"]."</center></td>";
                echo "</tr>";
       
        }
    }
    else
    {
        echo " <div class='d-flex justify-content-center align-items-center vh-100'>
            <h1>No Orders <i class='fa-solid fa-face-frown'></i></h1>
        </div>";
    }

}
else
{
    echo "<script>
    alert('Please login to see your orders');
    window.location.href='index.php';
    </script>"; 
}



?>