<?php
    require_once '../classes/User.php';
    require_once 'adminTop.php';
    $user = new User;
    $instructors = $user->getInstructorInfomation();
    $classes = $user->getClassesInfomation();
?>