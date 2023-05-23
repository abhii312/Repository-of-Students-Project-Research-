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
    </style>
</head>
<body>
    
</body>
</html>



<?php

include 'menu.php';

include_once "../shared/connection.php";

$query="select * from product";

$mysqli_obj=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($mysqli_obj))
{
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $impath=$row['impath'];

    echo "<div class='parent'>
            <h2>$name</h2>
            <h3>$price</h3>
            <img src='$impath'>
            <p>$details</p>


            <div class='text-center'> 
                <a href='addcart.php?pid=$pid'>                                       <!--To delete particular product-->
                <button class='btn btn-danger p-2'><i class='fas fa-shopping-cart'></i></button>
                </a>
            </div>
        </div>";  
}

?>