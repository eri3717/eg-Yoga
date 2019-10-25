<?php
    require_once '../classes/User.php';
    $loginid = $_SESSION["loginid"];
    $user = new User;
    $row = $user->userInfomation($loginid);
   
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
                        <a class="nav-link js-scroll-trigger" href="../index.php#schedule">Schedule</a>
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
                <div class="intro-lead-in">
                    <h2 class="">Welcom back to EG-YOGA</h2>
                    <span class="text-uppercase"><?php echo $row["firstname"]." ".$row["lastname"] ?></span>
                </div>
            </div>
        </div>
    </header>