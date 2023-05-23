<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        form
        {
            opacity: 1;
        }
        h5,h1
        {
            text-shadow: 1px 1px;

        }
    </style>
</head>
<body>
    <?php
    session_start();

    if(isset($_SESSION['username']))
    {
        include_once "../shared/connection.php";

        $cid=$_GET['cid'];

        $arr=array();

        $query1="select cid from enrolled_videos";

        $mysql_result1=mysqli_query($conn,$query1);

        while($row1=mysqli_fetch_assoc($mysql_result1))
        {
            $arr[]=$row1['cid'];
        }
        $arr1=in_array($cid,$arr);
        if($arr1)
        {
            echo "<script>
            alert('Course Already Enrolled');
            window.location.href='course.php';
            </script>";
    
        }
        else
        {
            
            $username=$_SESSION['username'];
            $cid=$_GET['cid'];
            $name=$_GET['name'];
            $price=$_GET['price'];
            $details=$_GET['details'];
            $vpath=$_GET['vpath'];


            echo   "<div class='d-flex justify-content-center align-items-center vh-100'>
                        <form action='' class='bg-warning p-5' method='POST'>
                            <h5 class='text-primary'>Enroll $name Course</h5></br></br>
                            <label>Course Name :  $name </label></br>
                            <label>Course Price : $price </label></br>
                            <label>Course details : $details </label></br>
                            <label>Select Payment Method</label><br>                           
                            <select name='payment' id='payment' required>
                                <option value='Phone Pe'>Phone Pe</option>
                                <option value='Google Pay'>Google Pay</option>
                                <option value='Paytm'>Paytm</option>
                                <option value='Credit/Debit Card'>Credit/Debit Card</option>
                            </select></br></br>
                            <div class='text-center'>
                                    <a href='coursedatabase.php?cid=$cid&name=$name&price=$price&details=$details&vpath=$vpath'>
                                        <button class='btn btn-danger p-2'>Enroll</button>
                                    </a>
                            </div>         
                        </form>
                    </div>";
            
            if(empty($_POST['payment']))
            {
                

            }
            else
            {
                $query="INSERT INTO `enrolled_videos`(`username`, `cid`, `name`,`Price`, `details`, `vpath`,`Payment`) VALUES ('$username','$cid','$name','$price','$details','$vpath','$_POST[payment]')";
                $mysql_result=mysqli_query($conn,$query);
                if($mysql_result)
                {
                    echo "<script>
                        alert('Course Enrolled Sucessfully');
                        window.location.href='mycourse.php';
                        </script>";
                }
                else
                {
                    echo "Data not inserted";
                }

            }
           
        }
       
        
        
            
             
           
    }
        
        

           
     
     else
     {
        echo "<script>
        alert('Please login to Enroll Course');
        window.location.href='index.php';
        </script>";

     }
           
       
    ?>

</body>
</html>

