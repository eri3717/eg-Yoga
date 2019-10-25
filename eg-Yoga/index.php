<?php
  session_start();
  require_once 'classes/User.php';
  $user = new User;
  $ticket = $user->getTicketInfomation();
  $instructors = $user->getInstructorInfomation();
  $classes = $user->getClassesInfomation();
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">EG-YOGA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#classes">Classes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">instructors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#ticket">ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#schedule">Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <?php
            if(!isset($_SESSION['loginid'])){
          ?>
          <li class="nav-item">
            <a class="cursor nav-link js-scroll-trigger" data-toggle="modal" data-target="#loginModal">Login</a>
          </li>
          <?php }else{
          ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="UI/profile.php">MyPage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="UI/logout.php">Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        
        <?php
          if(!isset($_SESSION["loginid"])){
        ?>
        <div class="intro-lead-in">Welcome To Our YOGA Lesson!</div>
        <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" data-toggle="modal" data-target="#loginModal">joinus</a>
        <?php }else{
          $user_info = $user->userInfomation($_SESSION["loginid"])
        ?>
        <div class="intro-lead-in">Welcome Back
          <span class="intro-lead-in text-uppercase text-primary"><?php echo $user_info["firstname"]." ".$user_info["lastname"] ?></span>
        </div>
        <div class="intro-heading text-uppercase">Enjoy Your YOGA Lessons</div>
        <?php } ?>
        
      </div>
    </div>
  </header>

  <!-- About -->
  <?php require_once 'UI/about.php' ?>
  
  <!-- classes -->
  <?php require_once 'UI/classes.php' ?>

  <!-- instructors -->
  <?php require_once 'UI/instructors.php' ?>

  <!-- ticket table -->
  <?php require_once 'UI/ticket.php' ?>

  <!---- Schedule ----->
  <?php require_once 'UI/schedule.php' ?>

  <!-- Clients -->
  <?php require_once 'UI/clients.php' ?>

  <!-- Contact -->
  <?php require_once 'UI/contactUs.php' ?>

  <!-- Footer -->
  <?php require_once 'UI/footer.php' ?>

  <!-- login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog mx-auto" role="document">
      <div class="modal-content">
        <div class="container login rounded m-0">
          <div class="row">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
              <div class="login-right d-flex align-items-center py-5">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="container">
                  <div class="row">
                    <div class="col-md-9 col-lg-8 mx-auto">
                      <h3 class="login-heading mb-4">Welcome back!</h3>
                      <form action="userAction.php" method="post">
                        <div class="form-label-group">
                          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                          <label for="inputEmail">Email address</label>
                        </div>
        
                        <div class="form-label-group">
                          <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
                          <label for="inputPassword">Password</label>
                        </div>
        
                        <div class="custom-control custom-checkbox mb-3">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="login" value="Login">
                        <div class="w-100 d-block text-right">
                          <a class="text-warning mr-3" href="#"> >> Forgot password?</a>
                        </div>
                        <div class="mx-auto mt-3">
                          <a class="btn btn-outline-dark btn-sl btn-block btn-login text-uppercase font-weight-bold" href="UI/register.php"><span class="">Create new account</span></a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>


</body>

</html>
