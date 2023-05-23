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

$order_id=$_GET['order_id'];

include_once "../shared/connection.php";

$query="select * from  user_order where order_id=$order_id";

$result=mysqli_query($conn,$query);

echo "<div class='d-flex justify-content-center align-items-center table table-lg mt-3 p-1'>
        <table style='width: 500px;mt-3' border='2'>
                        <tr class='bg-dark text-white'>
                            <th>Item Name</th>  
                            <th>Price</th>                 
                        </tr>
     </div>";
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td><center>".$row["Item_name"]."</center></td>";
            echo "<td><center>".$row["Price"]."</center></td>";
            echo "</tr>";
    }
}
else
{
    echo "<h1>Error in fetching data</h1>";

}

?>