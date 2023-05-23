<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <script>
    </script>
</body>
</html>
<?php

    include "menu.php";

    if(isset($_SESSION['username1']))
    {
       
        include_once "../shared/connection.php";

        $query='select * from order_manager';

        $result=mysqli_query($conn,$query);

                       
                                
        if(mysqli_num_rows($result)>0){

            echo "<div class='d-flex justify-content-center align-items-center table table-lg mt-3 p-1'>
                        <table style='mt-3' border='2'>
                                        <tr class='bg-dark text-white'>
                                        <th>order_id</th>
                                        <th>username</th>
                                        <th>Full Name</th>
                                        <th>Phone NUmber</th>
                                        <th>Address</th>
                                        <th>Payment Mode</th> 
                                        <th>View Order</th>
                                        </tr>                     
                    </div>";  
            while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td><center>".$row["order_id"]."</center></td>";
                    echo "<td><center>".$row["username"]."</center></td>";
                    echo "<td><center>".$row["Full_Name"]."</center></td>";
                    echo "<td><center>".$row["Phone_Number"]."</center></td>";
                    echo "<td><center>".$row["Address"]."</center></td>";
                    echo "<td><center>".$row["Payment_Mode"]."</center></td>";
                    echo "<td><a href='vieworder.php?order_id=$row[order_id]' class='btn btn-primary'>View Order</td>";             
                    echo "</tr>";
            }
        }
        else
        {
            echo " <div class='d-flex justify-content-center align-items-center vh-100'>
                        <h1>No Orders <i class='fa-solid fa-face-frown'></i> </h1>
                    </div>";

        }
    }
    else
    {
        echo "<script>
        alert('Please login to see orders');
        window.location.href='index.php';
        </script>"; 
        
    }


?>

