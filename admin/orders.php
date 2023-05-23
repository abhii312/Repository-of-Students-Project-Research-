<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <script>
    </script>
</body>
</html>
<?php

include "menu.php";

include_once "../shared/connection.php";

$query='select * from order_manager';

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)
{
    echo "<div class='d-flex justify-content-center align-items-center table table-lg mt-3 p-1'> 
        <table style='width:;mt-3' border='2'>
                        <tr class='bg-dark text-white'>
                        <th>order_id</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Payment Mode</th> 
                        <th>View Order<th>
                        <th colspan='2' align='center'>Operation</th>                       
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
            echo "<td><a href='updateorder.php?order_id=$row[order_id]&Full_Name=$row[Full_Name]&Phone_Number=$row[Phone_Number]&Address=$row[Address]&Payment_Mode=$row[Payment_Mode]' class='btn btn-warning ml-3'>Edit</td>";
            echo "<td><a href='deleteorder.php?order_id=".$row["order_id"]."' class='btn btn-danger ml-3'>Delete</td>";
            echo "</tr>";
    }
}
else
{
    echo " <div class='d-flex justify-content-center align-items-center vh-100'>
                <h1>No Data Found</h1>
            </div>";

}

?>