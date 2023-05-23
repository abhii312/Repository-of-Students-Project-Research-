<?php

$pid=$_GET['pid'];

session_start();


if(isset($_SESSION['username']))
{
    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart']=array();
    }

    $local_cart=$_SESSION['cart'];

    $index=in_array($pid,$local_cart);      //to search products in cart if product alredy in cart then we have show error.

    if($index)
    {
        echo "<h1>Product Already available in Cart</h1>";

    }
    else
    {
        array_push($local_cart,$pid); 
        $_SESSION['cart']=$local_cart;
        echo "<script>alert('Product Added to Cart');
            window.location.href='index.php';</script>";
        

    }

}
else
{
    echo "<script>
    alert('Please login to add product to cart');
    window.location.href='index.php';
    </script>";
}



?>