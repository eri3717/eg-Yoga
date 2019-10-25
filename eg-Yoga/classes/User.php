<?php
    require_once 'Database.php';
    class User extends Database {

        public function createNewAccount($fname, $lname, $gender, $b_day, $email, $pass, $conpass){
            if($pass == $conpass){
                $sql = "INSERT INTO login(email, password) VALUES('$email', md5('$pass'))";
                if($this->conn->query($sql)){
                    $id = mysqli_insert_id($this->conn);
                    $sql = "INSERT INTO user(firstname, lastname, gender, birthday, loginid) VALUES('$fname', '$lname', '$gender', '$b_day', '$id')";
                    if($this->conn->query($sql)){
                        header("Location: index.php");
                    }else{
                        echo $this->conn->error;
                    }
                }else{
                    echo $this->conn->error;
                }
                
            }else{
                echo "<script>
                        alert('Please confirm again your PASSWORD')
                    </script>";
            }
        }

        public function login($email, $pass){
            $sql = "SELECT * FROM login WHERE email = '$email' AND password = md5('$pass')";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $loginid = $row["loginid"];
                $_SESSION["loginid"] = $loginid;
                if($row["status"] == "U"){
                    header("Location: index.php");
                }elseif($row["status"] == "A"){
                    header("Location: UI/admin.php");
                }else{
                    echo $this->conn->error;
                }
            }else{
                echo "<script>
                        alert('Please confirm Email and Password');
                        location.replace('index.php');
                    </script>".$this->conn->error;            
            }
        }

        public function userInfomation($loginid){
            $sql = "SELECT * FROM user WHERE loginid = '$loginid'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            }else {
                die("Error 01".$this->conn->error);
            }
            return $row;
        }

        public function editUserInfo($fname, $lname, $gender, $b_day, $email, $pass, $conpass, $loginid){
            if($pass == $conpass){
                $pass = md5($pass);
                $sql = "UPDATE user INNER JOIN login ON user.loginid = login.loginid
                    SET user.firstname = '$fname',
                        user.lastname = '$lname',
                        user.gender = '$gender',
                        user.birthday = '$b_day',
                        login.email = '$email',
                        login.password = '$pass' WHERE login.loginid = '$loginid'";
                if($this->conn->query($sql)){
                    header("Location: UI/profile.php");
                }else {
                    die("Error editUser".$this->conn->error);
                }
            }else{
                echo "<script>
                        alert('Please confirm again your PASSWORD');
                        location.replace('UI/editUserInfo.php');
                    </script>";
            }
        }

        public function getLoginInfomation($loginid){
            $sql = "SELECT * FROM login WHERE loginid = '$loginid'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            }else {
                die("Error 02".$this->conn->error);
            }
            return $row;
        }

        public function deleteAccount($loginid){
            $sql = "DELETE login, user FROM login INNER JOIN user ON login.loginid = user.loginid WHERE login.loginid = '$loginid' LIMIT 1";
            if($this->conn->query($sql)){
                header("Location: index.php");
            }else{
                die("error delete".$this->conn->error);
            }
        }


        public function getTicketInfomation(){
            $sql = "SELECT * FROM ticket";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function getTicket($ticket_id, $loginid){
            $sql = "SELECT ticket_type FROM ticket WHERE ticket_id = '$ticket_id'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            $ticket_type = $row["ticket_type"];
            if($ticket_type){
                $sql = "INSERT INTO userTicket(loginid, ticket_id, ticket_amount) VALUES('$loginid', '$ticket_id', '$ticket_type')";
                if($this->conn->query($sql)){
                    header("Location: UI/profile.php");
                }else{
                    die("Error".$this->conn->error);
                }
            }else{
                die("Error".$this->conn->error);
            }
        }

        public function leftTicket($loginid){
            $sql = "SELECT * FROM userTicket INNER JOIN ticket ON userTicket.ticket_id = ticket.ticket_id WHERE loginid = '$loginid'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $totalTicket = 0;
                while($row = $result->fetch_assoc()){
                    $totalTicket += $row["ticket_amount"];
                }
                return $totalTicket;
            }else{
                return 0;
            }
        }

        public function useTicket($loginid, $schedule_id, $lesson_date){
            $sql = "SELECT * FROM userTicket WHERE loginid = '$loginid' AND ticket_amount >= 0 ORDER BY user_ticket_id DESC LIMIT 1";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                while($row = $result->fetch_assoc()){
                    $ticket_amount = $row["ticket_amount"] - 1;
                    $ut_id = $row['user_ticket_id'];
                    $sql = "UPDATE userTicket SET ticket_amount = '$ticket_amount' WHERE user_ticket_id = $ut_id";
                    if($this->conn->query($sql)){
                        $sql = "INSERT INTO userSchedule(loginid, schedule_id, booked_Ldate) VALUES('$loginid', '$schedule_id', '$lesson_date')";
                        if($this->conn->query($sql)){
                            $sql = "SELECT * FROM schedule WHERE schedule_id = '$schedule_id'";
                            $result = $this->conn->query($sql);
                            if($result->num_rows == 1){
                                while($row = $result->fetch_assoc()){
                                    $participant = $row["participants"] + 1;
                                    $sql = "UPDATE schedule SET participants = '$participant' WHERE schedule_id = '$schedule_id'";
                                    if($this->conn->query($sql)){
                                        header("Location: UI/profile.php");
                                    }else{
                                    die("Error".$this->conn->error);
                                    }
                                }
                            }else{
                                echo "error 1".$this->conn->error;
                            }
                        }else{
                            die("error 2".$this->conn->error);
                        }
                    }else{
                        die("error 3".$this->conn->error);
                    }
                }
                
                
            }elseif($result->num_rows == 0){
                echo "<script> alert('Please buy a new ticket');
                                window.location.replace('index.php#ticket');
                    </script>";
            }else{
                die("Error".$this->conn->error);
            }
            
        }

        public function getInstructorInfomation(){
            $sql = "SELECT * FROM instructor";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function getClassesInfomation(){
            $sql = "SELECT * FROM classes";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function addNewSchedule($class_id, $inst_id, $lesson_date, $start_time, $end_time){
            $sql = "INSERT INTO schedule(class_id, instructor_id, lesson_date,start_time, end_time) VALUES('$class_id', '$inst_id', '$lesson_date', '$start_time', '$end_time')";
            if($this->conn->query($sql)){
                header("Location: UI/adminSchedule.php");
            }else{
                die("Error".$this->conn->error);
            }
        }

        public function editScheduleInfomation($schedule_id){
            $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                           INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id WHERE schedule.schedule_id = '$schedule_id'";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                return $result->fetch_assoc();                  
            }else{
                die("Error".$this->conn->error);
            }
        }

        public function editSchedule($class_id, $instuctor_id, $lesson_date, $start_time, $end_time, $schedule_id, $status){
            if($start_time >= $end_time){
                echo "Please check the start time and end time";
            }else{
                $sql = "UPDATE schedule 
                        SET class_id = '$class_id',
                            instructor_id = '$instuctor_id',
                            lesson_date = '$lesson_date',
                            start_time = '$start_time',
                            end_time = '$end_time',
                            status = '$status' WHERE schedule_id = '$schedule_id'";
                if($this->conn->query($sql)){
                    header("Location: UI/adminSchedule.php");
                }else{
                    die("Error ".$this->conn->error);
                }
            }
        }

        public function getScheduleInfomation(){
            $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                           INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                           WHERE schedule.status not in ('done') AND schedule.lesson_date >= CURDATE()
                                           ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
            }else{
                die("Error".$this->conn->error);
            }
            return $rows;
        }

        public function getAllScheduleInfomation(){
            $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                           INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                           ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
            }else{
                die("Error".$this->conn->error);
            }
            return $rows;
        }

        public function getTodaysScheduleInfomation(){
            $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                           INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                           WHERE schedule.lesson_date = CURDATE()
                                           ORDER BY schedule.start_time ASC";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
            }else{
                die("Error".$this->conn->error);
            }
            return $rows;
        }

        public function getScheduleByDate(){
            $date = $_POST["selected_date"];
            $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                           INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                           WHERE schedule.lesson_date = '$date' AND schedule.status not in ('done') AND schedule.lesson_date >= CURDATE()
                                           ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
            }else{
                die("Error".$this->conn->error);
            }
            return $rows;
        }

        public function getSpecificSchedule(){
            if(isset($_POST["lessonTime"]) && !isset($_POST["lessonDay"])){
                $lesson_time = $_POST["lessonTime"];
                if($lesson_time == "daytime"){
                    $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                                INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                                WHERE schedule.start_time >= '6:00:00' AND schedule.end_time <= '18:00:00' AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done')
                                                ORDER BY schedule.lesson_date ASC";
                    $result = $this->conn->query($sql);
                    if($result == TRUE){
                        $rows = array();
                        while($row = $result->fetch_assoc()){
                            $rows[] = $row;
                        }
                    }else{
                        die("Error".$this->conn->error);
                    }
                    return $rows;
    
                }elseif($lesson_time == "nighttime"){
                    $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                                    INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                                    WHERE schedule.start_time >= '18:00:00' AND schedule.end_time <= '23:00:00' AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done')
                                                    ORDER BY schedule.lesson_date ASC";
                                                
                    $result = $this->conn->query($sql);
                    if($result == TRUE){
                        $rows = array();
                        while($row = $result->fetch_assoc()){
                            $rows[] = $row;
                        }
                    }else{
                        die("Error".$this->conn->error);
                    }
                    return $rows;
                }
            }elseif(isset($_POST["lessonDay"]) && !isset($_POST["lessonTime"])){
                $lesson_date = $_POST["lessonDay"];
                if($lesson_date == "weekday"){
                    $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                            INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                            WHERE WEEKDAY(schedule.lesson_date) < 5 AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done')
                            ORDER BY schedule.lesson_date ASC";
                    $result = $this->conn->query($sql);
                    if($result == TRUE){
                        $rows = array();
                        while($row = $result->fetch_assoc()){
                            $rows[] = $row;
                        }
                    }else{
                        die("Error".$this->conn->error);
                    }
                    return $rows;
    
                }elseif($lesson_date == "weekend"){
                    $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                                INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                                WHERE WEEKDAY(schedule.lesson_date) > 4 AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done')
                                                ORDER BY schedule.lesson_date ASC";
                    $result = $this->conn->query($sql);
                    if($result == TRUE){
                        $rows = array();
                        while($row = $result->fetch_assoc()){
                            $rows[] = $row;
                        }
                    }else{
                        die("Error".$this->conn->error);
                    }
                    return $rows;
                }
            }elseif(isset($_POST["instructor"])){
                $instuctor_id = $_POST["instructor"];
                $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                            INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                            WHERE schedule.instructor_id = '$instuctor_id' AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done')
                                            ORDER BY schedule.lesson_date ASC";
                $result = $this->conn->query($sql);
                if($result == TRUE){
                    $rows = array();
                    while($row = $result->fetch_assoc()){
                        $rows[] = $row;
                    }
                }else{
                    die("Error".$this->conn->error);
                }
                return $rows;
            }elseif(isset($_POST["class"])){
                $class_id = $_POST["class"];
                $sql = "SELECT * FROM schedule INNER JOIN classes ON schedule.class_id = classes.class_id
                                            INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id
                                            WHERE schedule.class_id = '$class_id' AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done')
                                            ORDER BY schedule.lesson_date ASC";
                $result = $this->conn->query($sql);
                if($result == TRUE){
                    $rows = array();
                    while($row = $result->fetch_assoc()){
                        $rows[] = $row;
                    }
                }else{
                    die("Error".$this->conn->error);
                }
                return $rows;
            }else{
                echo "No schedule";
            }
        }

        public function getUserSchedule($loginid, $schedule_id){
            $sql = "SELECT * FROM userSchedule WHERE loginid = '$loginid' AND schedule_id = '$schedule_id'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }else{
                return false;
            }
        }

        public function bookedLeeson($loginid){
            $sql = "SELECT COUNT(*) AS lessonCount FROM userSchedule INNER JOIN schedule ON userSchedule.schedule_id = schedule.schedule_id 
                    WHERE userSchedule.loginid = '$loginid' AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done') ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                return $row["lessonCount"];
            }else{
                die("Error".$this->conn->error);
            }
            
        }

        public function bookedList($loginid){
            $sql = "SELECT * FROM userSchedule INNER JOIN schedule ON userSchedule.schedule_id = schedule.schedule_id
                                                INNER JOIN classes ON schedule.class_id = classes.class_id
                                                INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id 
                                                WHERE userSchedule.loginid = '$loginid' AND schedule.lesson_date >= CURDATE() AND schedule.status not in ('done') ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
            }else{
                die("Error".$this->conn->error);
            }
            return $rows;
        }

        public function historyList($loginid){
            $sql = "SELECT * FROM userSchedule INNER JOIN schedule ON userSchedule.schedule_id = schedule.schedule_id
                                                INNER JOIN classes ON schedule.class_id = classes.class_id
                                                INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id 
                                                WHERE userSchedule.loginid = '$loginid' AND schedule.status ='done' ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
            }else{
                die("Error".$this->conn->error);
            }
            return $rows;
        }

        // public function resultLesson($loginid){
        //     $sql = "SELECT * FROM userSchedule INNER JOIN schedule ON userSchedule.schedule_id = schedule.schedule_id
        //                                         INNER JOIN classes ON schedule.class_id = classes.class_id
        //                                         INNER JOIN instructor ON schedule.instructor_id = instructor.instructor_id 
        //                                         WHERE userSchedule.loginid = '$loginid' AND schedule.status = 'done'
        //                                         ORDER BY schedule.lesson_date ASC";
        //     $result = $this->conn->query($sql);
        //     if($result == TRUE){
        //         $rows = array();
        //         while($row = $result->fetch_assoc()){
        //             $rows[] = $row;
        //         }
        //     }else{
        //         die("Error".$this->conn->error);
        //     }
        //     return $rows;
        // }

        public function cancelTheLesson($loginid, $schedule_id){
            $sql = "DELETE FROM userSchedule WHERE loginid = '$loginid' AND schedule_id = '$schedule_id' LIMIT 1 ";
            if($this->conn->query($sql)){
                $sql = "SELECT * FROM userTicket WHERE loginid = '$loginid' AND ticket_amount >= 0 ORDER BY user_ticket_id DESC LIMIT 1";
                $result = $this->conn->query($sql);
                if($result->num_rows == 1){
                    while($row = $result->fetch_assoc()){
                        $ticket_amount = $row["ticket_amount"] + 1;
                        $ut_id = $row['user_ticket_id'];
                        $sql = "UPDATE userTicket SET ticket_amount = '$ticket_amount' WHERE user_ticket_id = '$ut_id'";
                        if($this->conn->query($sql)){
                            header("Location: UI/profile.php");
                        }else{
                            die("Error".$this->conn->error);
                        }
                    }

                    $sql = "SELECT * FROM schedule WHERE schedule_id = '$schedule_id'";
                    $result = $this->conn->query($sql);
                    if($result->num_rows == 1){
                        while($row = $result->fetch_assoc()){
                            $participant = $row["participants"] - 1;
                            $sql = "UPDATE schedule SET participants = '$participant' WHERE schedule_id = '$schedule_id'";
                            if($this->conn->query($sql)){
                                
                            }else{
                                die("Error".$this->conn->error);
                            }
                        }
                    }else{
                        die("Error".$this->conn->error);
                    }
                }
            }
        }

        public function statusChangeToGoing($schedule_id){
            $sql = "UPDATE schedule SET status = 'going' WHERE schedule_id = '$schedule_id'";
            if($this->conn->query($sql)){
                header("Location: UI/adminSchedule.php");
            }else{
                die("Error to change going".$this->conn->error);
            }
        }

        public function statusChangeToDone($schedule_id){
            $sql = "UPDATE schedule SET status = 'done' WHERE schedule_id = '$schedule_id'";
            if($this->conn->query($sql)){
                header("Location: UI/adminSchedule.php");
            }else{
                die("Error to change done".$this->conn->error);
            }
        }

        public function deleteSchedule($schedule_id){
            $sql = "DELETE FROM schedule WHERE schedule_id = '$schedule_id' LIMIT 1";
            if($this->conn->query($sql)){
                header("Location: UI/adminSchedule.php");
            }else{
                die("Error delete schedule".$this->conn->error);
            }
        }

        public function getInstructorInfomationSpecific($instructor_id){
            $sql = "SELECT * FROM instructor WHERE instructor_id = '$instructor_id'";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                return $row;
            }else{
                return false;
            }
        }

        public function deleteInstructor($instructor_id){
            $sql = "DELETE FROM instructor WHERE instructor_id = '$instructor_id' LIMIT 1";
            if($this->conn->query($sql)){
                header("Location: UI/instructorsList.php");
            }else{
                die("Error delete schedule".$this->conn->error);
            }
        }

        public function numberOfTodaysLesson(){
            $sql = "SELECT COUNT(*) AS lessonCount FROM schedule WHERE lesson_date = CURDATE() ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                return $row["lessonCount"];
            }else{
                die("Error".$this->conn->error);
            }
            
        }

        public function numberOfTodaysParticipant(){
            $sql = "SELECT * FROM schedule WHERE lesson_date = CURDATE() ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result->num_rows >0){
                $participantAmount = 0;
                while($row = $result->fetch_assoc()){
                    $participantAmount += $row["participants"];
                }
                return $participantAmount;
            }else{
                die("Error".$this->conn->error);
            }
            
        }

        public function resultLesson($loginid){
            $sql = "SELECT COUNT(*) AS lessonCount FROM userSchedule INNER JOIN schedule ON userSchedule.schedule_id = schedule.schedule_id
                    WHERE schedule.status = 'done' AND userSchedule.loginid = '$loginid' 
                    ORDER BY schedule.lesson_date ASC";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                return $row["lessonCount"];
            }else{
                die("Error".$this->conn->error);
            }
            
        }

    }

   
?>