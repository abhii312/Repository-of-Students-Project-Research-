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
        .parent img{
            width:250px;
            height:200px;
        }
        .empty_cart
        {
            width:50px;
            height:50px;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php


include 'menu.php';
include '../shared/connection.php';


if(isset($_SESSION['username']))
{
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart']))
    {
        echo " <div class='d-flex justify-content-center align-items-center vh-100'>
                <h1>Cart is empty</h1>
                <img class='empty_cart' src='../image/empty_cart.webp'>
            </div>";
        die;

    }

    $local_cart=$_SESSION['cart'];

    $pids=implode(",",$local_cart);

    $query="select * from product where pid in ($pids)";

    $mysqli_obj=mysqli_query($conn,$query);

    $total_price=0;

    while($row=mysqli_fetch_assoc($mysqli_obj))
    {
        $pid=$row['pid'];
        $name=$row['name'];
        $price=$row['price'];
        $details=$row['details'];
        $impath=$row['impath'];

        $total_price += $price;

        echo "<div class='parent'>
                <h2>$name</h2>
                <h3>$price</h3>
                <img src='$impath'>
                <p>$details</p>

                <div class='text-center'>
                <a href='removecart.php?pid=$pid'>                                       <!--To delete particular product-->
                <button class='btn btn-danger p-2'><i class='fas fa-trash'></i></button>
                </a>
            </div>
        </div>";  

    }

    echo "<h1>Total Price=$total_price</h1>
        <a href='mycart.php'>
        <button class='btn btn-primary'>Proceed to Checkout</button>
        </a>";

}
else
{
    echo "<script>
    alert('Please login to view product in your cart');
    window.location.href='index.php';
    </script>";

}

      
?>