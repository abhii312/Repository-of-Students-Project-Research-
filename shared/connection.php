<?php

$conn=new mysqli("localhost","root","","library");

if($conn->connect_error)
{
    echo "<h2>Connection Error</h2>";
    die;
}

?>