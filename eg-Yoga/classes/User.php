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
                die("Error" . $this->conn->error);
            }
            return $row;
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
                    die("Error" . $this->conn->error);
                }
            }else{
                die("Error" . $this->conn->error);
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
            }
            return $totalTicket;
        }

        public function useTicket($loginid){
            $sql = "SELECT * FROM userTicket WHERE loginid = '$loginid' AND ticket_amount >= 0 ORDER BY user_ticket_id DESC LIMIT 1";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                while($row = $result->fetch_assoc()){
                    $ticket_amount = $row["ticket_amount"] - 1;
                    $ut_id = $row['user_ticket_id'];
                    $sql = "UPDATE userTicket SET ticket_amount = '$ticket_amount' WHERE user_ticket_id = $ut_id";
                    if($this->conn->query($sql)){
                        header("Location: UI/profile.php");
                    }else{
                        die("Error" . $this->conn->error);
                    }
                }
            }else{
                die("Error" . $this->conn->error);
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

       
    }

   
?>