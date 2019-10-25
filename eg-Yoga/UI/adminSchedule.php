<?php
    require_once '../classes/User.php';
    require_once 'adminTop.php';
    $user = new User;
    $schedule = $user->getAllScheduleInfomation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="w-75 mx-auto">
        <h2 class="py-2">All Lesson Schedule</h2>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th>Schedule id</th>
                    <th>Class Type</th>
                    <th>Instructor</th>
                    <th>Lesson Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Participants</th>
                    <th>Status</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($schedule as $row){
                        $schedule_id = $row["schedule_id"];
                    echo "<tr>
                            <th scope='row'>".$schedule_id."</th>
                            <td>".$row["class_type"]."</td>
                            <td>".$row["instructor_Fname"]." ".$row["instructor_Lname"]."</td>
                            <td>".$row["lesson_date"]."</td>
                            <td>".$row["start_time"]."</td>
                            <td>".$row["end_time"]."</td>
                            <td>".$row["participants"]."</td>";
                        if($row["status"] == "waiting"){
                            echo "<td><a href='../userAction.php?actionType=statusChangeToGoing&scheduleID=$schedule_id' class='btn btn-warning btn-sm w-100'>".$row["status"]."</a></td>";
                        }elseif($row["status"] == "going"){
                            echo "<td><a href='../userAction.php?actionType=statusChangeToDone&scheduleID=$schedule_id'class='btn btn-info btn-sm text-white w-100'>".$row["status"]."</a></td>";
                        }else{
                            echo "<td><button class='btn btn-secondary btn-sm text-white w-100' disabled>".$row["status"]."</button></td>";
                        }
                        echo "<td><a href='editSchedule.php?scheduleID=$schedule_id' class='btn btn-sm btn-success cursor'>Edit</a></td>
                        </tr>
                    ";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>

