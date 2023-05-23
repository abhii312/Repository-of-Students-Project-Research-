<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .parent_menu
        {
            display:flex;
            justify-content:strat;
            gap:30px;
        }

        .parent_menu a
        {
            color:inherit;
            text-decoration:none;
            padding:12px;
            border-radius:12px;
        }

        .parent_menu a:hover
        {
            background-color:#aaa;
        }
        .navbar .navbar-nav .nav-link {
            color: #000;
            font-size: 1.1em;
            padding: 0.8em;
        }
       

        .navbar .navbar-nav .nav-link.active {
            background-color: #3a0ca3;
            color: #fff;
        }
        
        @media screen and (min-width: 992px) {
            .navbar {
                padding: 0;
            }
        }
        @media screen and (max-width: 991px) {
            .navbar-nav {
                padding-top: 0.5em;
            }
        }
        .border
        {
            padding:4px;
            border-radius: 8px;
        }

    </style>
</head>
<body>
            <?php
                session_start();
            ?>
            <nav class="navbar navbar-expand-md navbar" style="background-color:skyblue">
                        <div class="container-fluid">
                            <a class="navbar-brand btn btn-warning border" href="#" style="font-style:italian;font-weight:bold;">CourSell</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="course.php">Upload Course Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="view.php">View Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="viewcourse.php">View Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="order.php">View Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">Contact us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <?php
                                            if(isset($_SESSION['username1']))
                                            { 
                                                $username1=$_SESSION['username1'];
                                                echo "<button class='border'><i class='fa fa-user'></i> $username1</button>";
                                            }                                                                              
                                            ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class='d-flex'>
                                <div class='ml-3'>
                                    <?php
                                        if(isset($_SESSION['username1']))
                                        {
                                            echo "<a href='logout.php'>
                                                     <button class='btn btn-danger'><i class='fa fa-sign-out'></i> Logout</button>
                                                </a>";
                                       }
                                       else
                                       {
                                            echo "<a href='login.html'>
                                                        <button class='btn btn-danger'><i class='fa fa-sign-in'></i> Login</button>
                                                    </a>";

                                       }
                                    ?>
                                  
                                </div>
                         </div>
                        </div>
                        
                </nav>
   
</body>
</html>