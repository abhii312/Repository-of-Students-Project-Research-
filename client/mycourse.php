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
    </style>
</head>
<body>

<?php

   include 'menu.php';

   if(isset($_SESSION['username']))
   {
        
        include_once "../shared/connection.php";

        $username=$_SESSION['username'];

        $query="select * from enrolled_videos where username='$username'";

        $mysqli_obj=mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($mysqli_obj))
        {
            $cid=$row['cid'];
            $name=$row['name'];
            $price=$row['Price'];
            $details=$row['details'];
            $vpath=$row['vpath'];

            echo "<div class='parent1'>
                    <h2>$name</h2>
                    <video width='320' height='240' controls src='$vpath'></video>
                    <h3>$price</h3>
                    <p>$details</p>


                    <div class='text-center'>
                        <a href='deletecourse.php?cid=$cid&name=$name&price=$price&details=$details&vpath=$vpath'>
                            <button class='btn btn-primary p-2'>Delete</button>
                        </a>
                    </div>
                </div>";  
        }

   }
   else
   {
        echo "<script>
            alert('Please login to see your orders');
            window.location.href='index.php';
            </script>";

   }
   

?>
    
</body>
</html>



