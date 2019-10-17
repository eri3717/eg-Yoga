<?php
    session_start();
    require_once '../classes/User.php';
    $loginid = $_SESSION["loginid"];
    $user = new User;
    $row = $user->userInfomation($loginid);
    $leftTicket = $user->leftTicket($loginid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EG-YOGA</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/agency.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="../index.php#page-top">EG-YOGA</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../index.php#classes">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../index.php#portfolio">instructors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../index.php#team">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../index.php#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="profile.php">MyPage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <!-- Header -->
    <header class="profile-top">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">How are you
                    <span class="text-uppercase"><?php echo $row["firstname"]." ".$row["lastname"] ?></span>
                </div>
            </div>
        </div>
    </header>

<!-- user infomation -->
    <div class="container">
        <div class="row my-5">
            <div class="col-md-5">
                <img src="../img/about/aboutimg.jpg" alt="userimage" class="w-100 profile">
            </div>
            <div class="col-md-7 profile-right">
                <h2 class="d-inline text-uppercase"><?php echo $row["firstname"]." ".$row["lastname"] ?></h2>
                <button class="btn btn-primary ml-5 mr-4">Edit</button><br>
                <b class="col-lg-8 pl-0">Your birthday : <span><?php echo $row["birthday"] ?></span></b>
                <span class="col-lg-4"><?php echo $row["gender"] ?></span>
                <div>
                    <span>Ticket left : <?php echo $leftTicket ?></span><br>
                    <a href="../index.php#ticket" class="btn btn-success">Buy New Ticket</a>
                    <a href="../index.php#schedule" class="btn btn-success">Book New Lesson</a>
                </div>
            </div>
        </div>
    </div>


<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2019</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/agency.min.js"></script>

</body>

</html>
