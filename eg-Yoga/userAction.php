<?php
    session_start();
    require_once 'classes/User.php';
    $user = new User;

    if(isset($_POST["submit"])){
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $gender = $_POST["gender"];
        $b_day = $_POST["birthday"];
        $email = $_POST["email"];
        $pass = $_POST["password_1"];
        $conpass = $_POST["password_2"];

        $user->createNewAccount($fname, $lname, $gender, $b_day, $email, $pass, $conpass);

    // }elseif(isset($_POST["search"])){
    //     $date = $_POST["date"];
    //     $user->getScheduleByDate($date);

    }elseif(isset($_POST["editUserInfo"])){
        $loginid = $_SESSION["loginid"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $gender = $_POST["gender"];
        $b_day = $_POST["birthday"];
        $email = $_POST["email"];
        $pass = $_POST["password_1"];
        $conpass = $_POST["password_2"];
        $user->editUserInfo($fname, $lname, $gender, $b_day, $email, $pass, $conpass, $loginid);

    }elseif(isset($_POST["login"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $signin = $user->login($email, $pass);
        
    }elseif(isset($_POST["addNewSchedule"])){
        $class_id = $_POST["classtype"];
        $inst_id = $_POST["instructor"];
        $lesson_date = $_POST["lessondate"];
        $start_time = $_POST["startTime"];
        $end_time = $_POST["endTime"];
        $user->addNewSchedule($class_id, $inst_id, $lesson_date, $start_time, $end_time);

    }elseif(isset($_POST["editSchedule"])){
        $class_id = $_POST["classtype"];
        $instuctor_id = $_POST["instructor"];
        $lesson_date = $_POST["lessondate"];
        $start_time = $_POST["startTime"];
        $end_time = $_POST["endTime"];
        $schedule_id = $_POST["schedule_id"];
        $status = $_POST["status"];
        $user->editSchedule($class_id, $instuctor_id, $lesson_date, $start_time, $end_time, $schedule_id, $status);

    }elseif($_GET["actionType"] == "getTicket"){
        $ticket_id = $_GET["ticketID"];
        $loginid = $_SESSION["loginid"];
        
        if($loginid == TRUE){
            $user->getTicket($ticket_id, $loginid);
        }else{
            header("Location: index.php#loginModal");
        }
        
    }elseif($_GET["actionType"] == "useTicket"){
        $loginid = $_SESSION["loginid"];
        $schedule_id = $_GET["scheduleID"];
        $lesson_date = $_GET["date"];
        $user->useTicket($loginid, $schedule_id, $lesson_date);
        
    }elseif($_GET["actionType"] == "cancel"){
        $loginid = $_SESSION["loginid"];
        $schedule_id = $_GET["scheduleID"];
        $user->cancelTheLesson($loginid, $schedule_id);

    }elseif($_GET["actionType"] == "statusChangeToGoing"){
        $schedule_id = $_GET["scheduleID"];
        $user->statusChangeToGoing($schedule_id);

    }elseif($_GET["actionType"] == "statusChangeToDone"){
        $schedule_id = $_GET["scheduleID"];
        $user->statusChangeToDone($schedule_id);

    }elseif($_GET["actionType"] == "deleteSchedule"){
        $schedule_id = $_GET["scheduleID"];
        $user->deleteSchedule($schedule_id);

    }elseif($_GET["actionType"] == "deleteAccount"){
        $loginid = $_GET["loginID"];
        $user->deleteAccount($loginid);

    }elseif($_GET["actionType"] == "deleteInstructor"){
        $instructor_id = $_GET["instructorID"];
        $user->deleteInstructor($instructor_id);
    }

?>