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

    }elseif(isset($_POST["login"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $signin = $user->login($email, $pass);
        
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
        $user->useTicket($loginid);
    }
?>