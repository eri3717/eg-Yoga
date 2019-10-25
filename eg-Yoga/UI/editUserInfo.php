<?php
    session_start();
    require_once '../classes/User.php';
    $loginid = $_SESSION["loginid"];
    $user = new User;
    $user_info = $user->userInfomation($loginid);
    $login_info = $user->getLoginInfomation($loginid);
?>
<?php require_once 'userTop.php' ?>
    
    <div class="w-50 mx-auto m-5">
        <h1 class="mb-5">Edit Infomation</h1>
        <form action="../userAction.php" method="post">
            <label for="" class="col-md-3 my-3">First Name</label>
            <input type="text" name="firstname" value="<?php echo $user_info["firstname"] ?>" placeholder="First Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Last Name</label>
            <input type="text" name="lastname" value="<?php echo $user_info["lastname"] ?>" placeholder="Last Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Gender</label>
            <div class="d-inline col-md-8">
                <input type="radio" value="male" name="gender"><span class="mx-2">Male</span>
                <input type="radio" value="female" name="gender"><span class="mx-2">Female</span>
                <input type="radio" value="none" name="gender"><span class="mx-2">None</span><br>
            </div>
            <label for="" class="col-md-3 my-3">Birth Day</label>
            <input type="date" name="birthday" value="<?php echo $user_info["birthday"] ?>"  class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3" value="<?php echo $user_info["birthday"] ?>">Email</label>
            <input type="email" name="email" value="<?php echo $login_info["email"] ?>" placeholder="Email Address" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">New Password</label>
            <input type="password" name="password_1" placeholder="Password" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Confirm New Password</label>
            <input type="password" name="password_2" placeholder="Confirm Password" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3"></label>
            <input type="submit" value="EDIT" name="editUserInfo" class="btn btn-primary btn-lg col-md-8 my-3">
        </form>
        <div class="w-100 text-right mt-3">
            <a href="profile.php" class="text-warning mr-5"> >> GO BACK</a>
        </div>
        <a onclick="myAlert()" href="../userAction.php?actionType=deleteAccount&loginID=<?php echo $loginid ?>" class="mx-auto d-block btn text-danger my-5 btn-lg">>> DELETE THE ACCOUNT <<</a>
        <script>
            function myAlert(){
                alert("Do you want to delete the account?");
            }
        </script>
    </div>

    <?php require_once 'contactUs.php' ?>


<!-- Footer -->
    <?php require_once 'footer.php' ?>

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
