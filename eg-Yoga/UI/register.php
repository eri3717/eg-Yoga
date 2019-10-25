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

<body id="register">
    <div class="conteiner-fluid register-content">
        <h1 class="mb-5">Register</h1>
        <form action="../userAction.php" method="post">
            <label for="" class="col-md-3 my-3">First Name</label>
            <input type="text" name="firstname" placeholder="First Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Last Name</label>
            <input type="text" name="lastname" placeholder="Last Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Gender</label>
            <div class="d-inline col-md-8">
                <input type="radio" value="male" name="gender"><span class="mx-2">Male</span>
                <input type="radio" value="female" name="gender"><span class="mx-2">Female</span>
                <input type="radio" value="none" name="gender"><span class="mx-2">None</span><br>
            </div>
            <label for="" class="col-md-3 my-3">Birth Day</label>
            <input type="date" name="birthday" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Email</label>
            <input type="email" name="email" placeholder="Email Address" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Password</label>
            <input type="password" name="password_1" placeholder="Password" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Confirm Password</label>
            <input type="password" name="password_2" placeholder="Confirm Password" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3"></label>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg col-md-8 my-3">
        </form>
        <div class="w-100 text-right mt-3">
            <a href="../index.php" class="text-warning"> >> GO BACK</a>
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