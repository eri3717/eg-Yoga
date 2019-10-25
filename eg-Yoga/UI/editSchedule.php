<?php
    require_once '../classes/User.php';
    require_once 'adminTop.php';
    $user = new User;
    $schedule_id = $_GET["scheduleID"];
    $edit = $user->editScheduleInfomation($schedule_id);
    $instructors = $user->getInstructorInfomation();
    $classes = $user->getClassesInfomation();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="w-50 mx-auto mt-5 pt-5">
        <h2>Edit Schedule</h2>
        <form action="../userAction.php" method="post">
            <label for="" class="col-md-2">Class Type</label>
            <select name="classtype" class="custom-select col-md-9 m-2">
                <?php
                foreach($classes as $row){
                    $selected = $row['class_id'] === $edit['class_id'] ? "selected" : "";
                    $class_type = $row["class_type"];
                    $class_id = $row["class_id"];
                    echo "<option value='".$class_id."' $selected>".$class_type."</option>";
                }
                ?> 
            </select><br>
            <label for="" class="col-md-2">Instructor</label>
            <select name="instructor" class="custom-select col-md-9 m-2">
            <?php
                foreach($instructors as $row){
                    $selected = $row['instructor_id'] === $edit['instructor_id'] ? "selected" : "";
                    $inst_Fname = $row["instructor_Fname"];
                    $inst_Lname = $row["instructor_Lname"];
                    $inst_id = $row["instructor_id"];
                    echo "<option value='".$inst_id."' $selected>".$inst_Fname." ".$inst_Lname."</option>";
                }
                ?> 
            </select><br>
            <label for="" class="col-md-2">Lesson Date</label>
            <input type="date" name="lessondate" id="" value="<?php echo $edit['lesson_date']; ?>" class="form-control d-inline col-md-9 m-2"><br>
            <div>
                <label for="" class="col-md-2">start time</label>
                <input type="time" name="startTime" id="" value="<?php echo $edit['start_time']; ?>" class="form-control d-inline col-md-2 m-2">
            </div>
            <div>
                <label for="" class="col-md-2">end time</label>
                <input type="time" name="endTime" id="" value="<?php echo $edit['end_time']; ?>" class="form-control d-inline col-md-2 m-2">            
            </div>
            <label for="" class="col-md-2">Status</label>
            <select name="status" id="" class="custom-select col-md-2 m-2">
                <option value="waiting">waiting</option>
                <option value="going">going</option>
                <option value="done">done</option>
            </select>
            <input type="hidden" name="schedule_id" value="<?php echo $schedule_id; ?>">
            <input type="submit" value="Edit Schedule" name="editSchedule" class="w-100 mx-auto d-block btn btn-success my-5 btn-lg">
        </form>
        <a onclick="myAlert()" href="../userAction.php?actionType=deleteSchedule&scheduleID=<?php echo $schedule_id; ?>" class="w-100 mx-auto d-block btn text-danger my-5 btn-lg">>> DELETE THIS SCHEDULE <<</a>
        <script>
            function myAlert(){
                alert("Do you want to delete the account?");
            }
        </script>
    </div>
</body>
</html>