<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
    .parent{
            width:fit-content;
            padding:20px;
            background-color:bisque;
            display:inline-block;
            margin-left:10px;
            margin-top:10px;

        }
    </style>
</head>
<body>
    <?php

        include 'menu.php';
        include '../shared/connection.php';


        if(!isset($_SESSION['cart']))
        {
            echo "<h1>Cart is empty</h1>";
            die;

        }
        $local_cart=$_SESSION['cart'];

        $pids=implode(",",$local_cart);


        $cmd="select * from product where pid in ($pids)";

        $result=mysqli_query($conn,$cmd);

        $total_price=0;
        $quantity=1;

        echo "<table style='width:50%;mt-3' border='1' class='text-center'>
                                <tr>
                                <th>Image</th>
                                <th>Poduct id</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th clospan='2'>Operation</th>                        
                                </tr>";

        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_array($result)) {

            $pid=$row['pid'];
            $name=$row['name'];
            $price=$row['price'];
            $details=$row['details'];
            $impath=$row['impath'];

            $total_price += $price;
                
                echo "<tr>";
                echo "<td>" . "<img src=".$row['impath'].' width=150px height="100px">' . "</td>";
                echo "<td>" . $row['pid']."</td>";
                echo "<td>" . $row['name']."</td>";
                echo "<td>" . $row['price']."</td>"; 
                echo "<td><a href='removecart.php?pid=".$row["pid"]."' class='btn btn-danger'>Delete</td>";
                echo "</tr>";
            }
            
            echo "</table>";
                
            mysqli_free_result($result);
        } 
        else 
        {
            echo "No records found";
        }

        $count=0;
        if(isset($_SESSION['cart']))
        {
            $count=count($_SESSION['cart']);
        }

        echo "<div class='parent p-4 ml-3'>
            <h4>Total Products:   $count</h4>
            <h4>Total Price: $total_price</h4>";           

    ?>

    <form action="order.php"  method="POST">
        <h1>Delivery Address</h1>
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="paymode" type="radio" value="COD" id="flexRadioDefault" required>
            <label class="form-check-label" for="flexRadioDefault" required>Cash On Delivery</labe>
        </div>
        <button  class="btn btn-primary" name="purchase">Make Purchase</button>
    </form>

</body>
</html>


