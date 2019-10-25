<?php
    session_start();
    require_once '../classes/User.php';
    $loginid = $_SESSION["loginid"];
    $user = new User;
    $row = $user->userInfomation($loginid);
    $numberLesson = $user->numberOfTodaysLesson();
    $participant = $user->numberOfTodaysParticipant();
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
    <div class="admin">

    <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="admin.php">EG-YOGA</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="todaysSchedule.php">Today's Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="adminSchedule.php">All Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="addSchedule.php">Add New Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="InstructorsList.php">Instructors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="usersList.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <header class="admin-top2">
            <div class="container">
                <div class="intro-text"></div>
                <div class="intro-lead-in">
                    <span class="">How are you</span>
                    <span class="text-uppercase"><?php echo $row["firstname"]." ".$row["lastname"] ?></span>
                </div>
            </div>
        </header>
        
        <!-- today's schedule -->
        <div class="container">
            <div class="card-group">
                <div class="card admin-top-card">
                    <div class="card-body">
                        <h4 class="card-title text-purple">Number of <br>Lessons today</h4>
                        <h3><?php echo $numberLesson ?></h3>
                        <p>Lessons</p>
                        <a href="todaysSchedule.php" class="text-danger">>> Today's Lessons</a>
                    </div>
                </div>
                <div class="card admin-top-card">
                    <div class="card-body">
                        <h4 class="card-title text-purple">Number of <br>Participants today</h4>
                        <h3><?php echo $participant ?></h3>
                        <p>Participants</p>
                        <a href="todaysParticipant.php" class="text-danger">>> Participants List</a>
                    </div>
                </div>
                <div class="card admin-top-card">
                    <div class="card-body">
                        <h4 class="card-title text-purple mt-3">TODAY</h4>
                        <br>
                        <h3 class=""><?php echo date("Y/m/d"); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
