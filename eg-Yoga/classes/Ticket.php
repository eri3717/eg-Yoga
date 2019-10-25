<?php
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
                header("Location: UI/profile.php");
            }else{
                die("Error" . $this->conn->error);
            }
        }
        
        $sql = "INSERT INTO userSchedule(loginid, schedule_id, booked_Ldate) VALUES('$loginid', '$schedule_id', '$lesson_date')";
        if($this->conn->query($sql)){
            $sql = "SELECT * FROM schedule WHERE schedule_id = '$schedule_id'";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                while($row = $result->fetch_assoc()){
                    $participant = $row["participants"] + 1;
                    $sql = "UPDATE schedule SET participants = '$participant' WHERE schedule_id = '$schedule_id'";
                    if($this->conn->query($sql)){
                    }else{
                    die("Error" . $this->conn->error);
                    }
                }
            }
        }else{
            die("Error" . $this->conn->error);
        }
    }elseif($result->num_rows == 0){
        echo "<script> alert('Please buy a new ticket');
                        window.location.replace('index.php#ticket');
            </script>";
    }else{
        die("Error" . $this->conn->error);
    }
    
}

?>