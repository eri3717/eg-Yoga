<?php
    require_once '../classes/User.php';
    require_once 'adminTop.php';
    $user = new User;
?>
<body id="register">
    <div class="w-50 mx-auto m-5">
        <h1 class="mb-5">ADD NEW Instructor</h1>
        <form action="../userAction.php" method="post">
            <label for="" class="col-md-3 my-3">First Name</label>
            <input type="text" name="firstname" value="" placeholder="First Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Last Name</label>
            <input type="text" name="lastname" value="" placeholder="Last Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Detail</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
            <label for="" class="col-md-3 my-3"></label>
            <input type="submit" value="EDIT" name="editUserInfo" class="btn btn-primary btn-lg w-100 my-3">
        </form>
        <div class="w-100 text-right mt-3">
            <a href="instructorsList.php" class="text-warning mr-5"> >> GO BACK</a>
        </div>
    </div>



</body>

</html>