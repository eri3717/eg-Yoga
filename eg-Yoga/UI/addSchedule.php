<?php
    require_once '../classes/User.php';
    require_once 'adminTop.php';
    $user = new User;
    $instructors = $user->getInstructorInfomation();
    $classes = $user->getClassesInfomation();
?>
<body>
    <div class="w-50 mx-auto mt-5 pt-5">
        <h2>Add New Schedule</h2>
        <form action="../userAction.php" method="post">
            <label for="" class="col-md-2">Class Type</label>
            <select name="classtype" class="custom-select col-md-9 m-2">
                <?php
                foreach($classes as $row){
                $class_type = $row["class_type"];
                $class_id = $row["class_id"];
                echo "<option value='".$class_id."' name='classtype'>".$class_type."</option>";
                }
                ?>   
            </select><br>
            <label for="" class="col-md-2">Instructor</label>
            <select name="instructor" class="custom-select col-md-9 m-2">
                <?php
                foreach($instructors as $row){
                $inst_Fname = $row["instructor_Fname"];
                $inst_Lname = $row["instructor_Lname"];
                $inst_id = $row["instructor_id"];
                echo "<option value='".$inst_id."' name='instructor'>".$inst_Fname." ".$inst_Lname."</option>";
                }
                ?>   
            </select><br>
            <label for="" class="col-md-2">Lesson Date</label>
            <input type="date" name="lessondate" id="" class="form-control d-inline col-md-9 m-2"><br>
            <div>
                <label for="" class="col-md-2">Start Time</label>
                <input type="time" name="startTime" id="" class="form-control d-inline col-md-2 m-2">
            </div>
            <div>
                <label for="" class="col-md-2">End Time</label>
                <input type="time" name="endTime" id="" class="form-control d-inline col-md-2 m-2">            
            </div>
            <div class="p-2">
                <input type="submit" value="Add Schedule" name="addNewSchedule" class="w-100 mx-auto d-block btn btn-success my-2">  
            </div>
        
        </form>
    </div>
</body>
</html>