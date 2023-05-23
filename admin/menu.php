<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        body {
             background-image: url('../image/background.webp');
        }
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
        .cart-count-parent
        {
            position:relative;
        }

        .cart-count
        {
            padding:5px;
            border-radius:50%;
            background-color:aqua;
            color:white;
            position:absolute;
            right:-10px;
            top:-10px;
            font-weight:bold;
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

    </style>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid" style="background-color:lightblue">
                    <a class="navbar-brand btn btn-dark border" href="#" style="color:red;font-style:italian;">CourSell</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="user.php">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.php">Orders</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>

</body>
</html>