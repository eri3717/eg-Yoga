<?php
    require_once '../classes/User.php';
    require_once 'adminTop.php';
    $user = new User;
    $instructor_id = $_GET["instructorID"];
    $row = $user->getInstructorInfomationSpecific($instructor_id);
?>
<body id="register">
    <div class="w-50 mx-auto m-5">
        <h1 class="mb-5">Edit Instructor</h1>
        <?php
            $f_name = $row["instructor_Fname"]; 
            $l_name = $row["instructor_Lname"];
            $detail = $row["instructor_detail"];
        ?>
        <form action="../userAction.php" method="post">
            <label for="" class="col-md-3 my-3">First Name</label>
            <input type="text" name="firstname" value="<?php echo $f_name ?>" placeholder="First Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Last Name</label>
            <input type="text" name="lastname" value="<?php echo $l_name ?>" placeholder="Last Name" class="form-control d-inline col-md-8 input"><br>
            <label for="" class="col-md-3 my-3">Detail</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control"><?php echo $detail ?></textarea>
            <label for="" class="col-md-3 my-3"></label>
            <input type="submit" value="EDIT" name="editUserInfo" class="btn btn-success btn-lg w-100 my-3">
        </form>
        <div class="w-100 text-right mt-3">
            <a href="instructorsList.php" class="text-warning mr-5"> >> GO BACK</a>
        </div>
        <a onclick="myAlert()" href="../userAction.php?actionType=deleteInstructor&instructorID=<?php echo $instructor_id ?>" class="mx-auto d-block btn text-danger my-5 btn-lg">>> DELETE THE INSTRUCTOR <<</a>
        <script>
            function myAlert(){
                alert("Do you want to delete the account?");
            }
        </script>
    </div>



</body>

</html>