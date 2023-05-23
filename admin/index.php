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

$query='select * from vendor_account';

$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0){

    echo "<h2 style='text-align:center'>Vendor Details</h2>";

    echo "<div class='d-flex justify-content-center align-items-center table table-lg mt-3 p-1'>
                    <table style='width:50%;mt-3' border='2'>
                                <tr>
                                <th>user_id</th>
                                <th>Username</th>
                                <th>password</th>
                                <th>Phone_number</th> 
                                <th colspan='2' align='center'>Opeartion</th>                       
                                </tr>
            </div>";
            
    while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td><center>".$row["user_id"]."</center></td>";
            echo "<td><center>".$row["username"]."</center></td>";
            echo "<td><center>".$row["password"]."</center></td>";
            echo "<td><center>".$row["mobile"]."</center></td>";
            echo "<td><a href='update_vendor.php?user_id=$row[user_id]&username=$row[username]&password=$row[password]&mobile=$row[mobile]' class='btn btn-warning ml-3'>Edit</td>";
            echo "<td><a href='deletevendor.php?user_id=".$row["user_id"]."' class='btn btn-danger ml-3'>Delete</td>";
            echo "</tr>";
    }
}
else
{
    echo "<h1>Error in fetching data</h1>";

}

?>