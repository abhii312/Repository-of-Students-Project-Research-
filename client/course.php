<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        .parent1{
            width:fit-content;
            padding:20px;
            background-color:bisque;
            display:inline-block;
            margin-left:10px;
            margin-top:10px;

        }
        .parent1 img{
            width:200px;
            height:200px;
        }
        #myInput1 {
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-left: 12px;
        }
    </style>
</head>
<body>

<?php


include 'menu.php';

    echo "<input type='text' id='myInput1' onkeyup='myFunction()' placeholder='Search Course Videos'  title='Type in a name'>";

    include_once "../shared/connection.php";


    $query="select * from videos";

    $mysqli_obj=mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($mysqli_obj))
    {
        $cid=$row['cid'];
        $name=$row['c_name'];
        $price=$row['price'];
        $details=$row['details'];
        $cimpath=$row['cimpath'];
        $vpath=$row['vpath'];

        echo "<div class='parent1'>
                <h2>$name</h2>
                <img src='$cimpath'>
                <h3>$price</h3>
                <p>$details</p>


                <div class='text-center'>
                    <a href='enrollcourse.php?cid=$cid&name=$name&price=$price&details=$details&vpath=$vpath'>
                    <button class='btn btn-primary p-2'>Enroll Course Video</button>
                    </a>
                </div>
            </div>";  
    }

    

?>
    
</body>
</html>



