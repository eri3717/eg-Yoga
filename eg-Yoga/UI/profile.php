<?php
    session_start();
    require_once '../classes/User.php';
    $loginid = $_SESSION["loginid"];
    $user = new User;
    $row = $user->userInfomation($loginid);
    $leftTicket = $user->leftTicket($loginid);
    $booked = $user->bookedLeeson($loginid);
    $bookedlist = $user->bookedList($loginid);
    $historylist = $user->historyList($loginid);
    $resultlesson  = $user->resultLesson($loginid);
?>

<?php require_once 'userTop.php' ?>

<!-- user infomation -->
    <div class="container pt-5">
        <div class="row my-5">
            <div class="col-md-5">
                <img src="../img/about/aboutimg.jpg" alt="userimage" class="w-100 profile">
            </div>
            <div class="col-md-7 profile-right">
                <h2 class="d-inline text-uppercase"><?php echo $row["firstname"]." ".$row["lastname"] ?></h2>
                <a href="editUserInfo.php" class="btn btn-primary mt-2 ml-5 mr-4">Edit</a><br>
                <div class="row">
                    <h6 class="col-md-9 mt-2">Your birthday : <span><?php echo $row["birthday"] ?></span></h6>
                    <!-- <span class="col-md-3"><?php echo $row["gender"] ?></span> -->
                </div>
                <div class="card-group text-center mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ticket left</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Now you have</h6>
                            <h5 class="card-text my-3 text-danger"><?php echo $leftTicket ?> Ticket</h5>
                            <a href="../index.php#ticket" class="btn btn-success">Buy New Ticket</a>

                        </div>         
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Booked Lesson</h4>
                            <h6 class="card-subtitle mb-2 text-muted">You are booking</h6>
                            <h5 class="card-text my-3 text-danger"><?php echo $booked ?> Lesson</h5>
                            <a href="../index.php#schedule" class="btn btn-success">Book New Lesson</a>
                        </div>         
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- lesson list -->
    <div class="container mx-auto us_lesson_list">
        <div class="mb-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="booked-tab" data-toggle="tab" href="#booked" role="tab" aria-controls="booked" aria-selected="true"><h5>Booked Lesson List</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="result-tab" data-toggle="tab" href="#result" role="tab" aria-controls="result" aria-selected="false"><h5>History Lesson List</h5></a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="container tab-pane fade show active" id="booked" role="tabpanel" aria-labelledby="booked-tab">
                <table class="table">
                    <thead class="thead-dark th_font">
                        <tr>
                            <th class="text-center">Lesson Number</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Class</th>
                            <th>instructor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bookedlist as $row): 
                            $scheduleID = $row["schedule_id"];
                            $row["end_time"];
                        ?>
                        <tr>
                            <th class="text-center py-4"><?php echo $scheduleID ?></th>
                            <td class="py-4"><?php echo $row["lesson_date"] ?></td>
                            <td class="py-4"><?php echo $row["start_time"]." - ".$row["end_time"] ?></td>
                            <td class="py-4"><a href=""><?php echo $row["class_type"] ?></a></td>
                            <td class="py-4"><a href=""><?php echo $row["instructor_Fname"]." ".$row["instructor_Fname"] ?></a></td>
                            <td class="py-4"><?php echo "<a href='../userAction.php?actionType=cancel&scheduleID=$scheduleID&loginid=$loginid' class='btn btn-outline-warning'>cancel</a>" ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="container tab-pane fade" id="result" role="tabpanel" aria-labelledby="result-tab">
            <table class="table">
                <h5>Total number of attended lessons : <span class="mx-3 text-purple"><?php echo $resultlesson ?></span></h5>
                
                    <thead class="thead-dark th_font">
                        <tr>
                            <th class="text-center">Lesson Number</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Class</th>
                            <th>instructor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($historylist as $row): 
                            $scheduleID = $row["schedule_id"];
                            $row["end_time"];
                        ?>
                        <tr>
                            <th class="text-center py-4"><?php echo $scheduleID ?></th>
                            <td class="py-4"><?php echo $row["lesson_date"] ?></td>
                            <td class="py-4"><?php echo $row["start_time"]." - ".$row["end_time"] ?></td>
                            <td class="py-4"><a href=""><?php echo $row["class_type"] ?></a></td>
                            <td class="py-4"><a href=""><?php echo $row["instructor_Fname"]." ".$row["instructor_Fname"] ?></a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
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
