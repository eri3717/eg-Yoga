<!------------------->
<!---- Schedule ----->
<!------------------->

  <section class="page-section" id="schedule">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Schedule</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>

      <!-- select date -->
      <div class="card">
        <div class="card-body">
          <span class="h4">Select a Date</span>
          <form method="post" action="index.php#schedule">
            <input type="date" name="selected_date" class="form-control d-inline w-25" value="" required>
            <input type="submit" name="search" class="btn btn-success" value="Search">
            <button type="button" onclick="window.location.href='index.php';" class="btn btn-outline-warning" >Reset</button>
          </form>
        </div>
      </div>
      
      <!-- select specific -->
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <button class="btn collapsed text-left col-md-10" data-toggle="collapse" data-target="#findClass" aria-expanded="false" aria-controls="findClass">
              <span class="h4">Find a Class <i class="fas fa-angle-double-down p-2"></i></span>
            </button>
            <?php
              if(isset($_SESSION["loginid"])){
            ?>
              <a class="ml-3 btn" href="UI/profile.php"> >> MyPage</a>
            <?php }else{ ?>
              <a class="ml-3 btn cursor" data-toggle="modal" data-target="#loginModal"> >> Login</a>
            <?php } ?>
          </div>
          <div id="findClass" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <form method="post" class="row" action="index.php#schedule">
              <div class="card-body">
                  <div class="col-md-10 my-3">
                    <input type="checkbox" class="m-3" name="lessonTime" value="daytime"><span>Day time</span>
                    <input type="checkbox" class="m-3" name="lessonTime" value="nighttime"><span>Night time</span>
                    <input type="checkbox" class="m-3" name="lessonDay" value="weekday"><span>Week Day</span>
                    <input type="checkbox" class="m-3" name="lessonDay" value="weekend"><span>Week End</span>
                  </div>
                  <div class="row mx-auto d-block mb-3">
                    <select name="instructor" class="custom-select col-md-5 mx-2">
                      <option selected>Instructor</option>
                      <?php
                      foreach($instructors as $row){
                        $inst_Fname = $row["instructor_Fname"];
                        $inst_Lname = $row["instructor_Lname"];
                        $instructor_id = $row["instructor_id"];
                        echo "<option value='".$instructor_id."'>".$inst_Fname." ".$inst_Lname."</option>";
                      }
                      ?>   
                    </select>
                    <select name="class" class="custom-select col-md-5 mx-2">
                      <option selected>Class Type</option>
                      <?php
                      foreach($classes as $row){
                        $class_type = $row["class_type"];
                        $class_id = $row["class_id"];
                        echo "<option value='".$class_id."'>".$class_type."</option>";
                      }
                      ?>   
                    </select>
                  </div>
                <div>
                  <input type="submit" name="lessonSearchSpecific" value="Search" class="btn btn-success ml-2">
                  <button type="button" onclick="window.location.href='index.php';" class="btn btn-outline-warning">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="schedule">
        <?php
        if(isset($_SESSION["loginid"])){
          $loginid = $_SESSION["loginid"];
          if(isset($_POST['search'])){
            $schedule = $user->getScheduleByDate();
          }elseif(isset($_POST["lessonSearchSpecific"])){
            $schedule = $user->getSpecificSchedule();
          }elseif(!isset($_POST['search'])){
            $schedule = $user->getScheduleInfomation();
          }
          
          foreach($schedule as $row){
            $schedule_id = $row["schedule_id"];
            $schedule_status = $row["status"];
            $lesson_date = $row["lesson_date"];
            $start_time = $row["start_time"];
            $end_time = $row["end_time"];
            $class = $row["class_type"];
            $class_detail = $row["class_detail"];
            $class_level = $row["class_level"];
            $instructor_name = $row["instructor_Fname"]." ".$row["instructor_Lname"];
            $instructor_detail = $row["instructor_detail"];
            $us_schedule = $user->getUserSchedule($loginid, $schedule_id);
            
            echo
             "<h4 class='mt-3 ml-2'>$lesson_date</h4>
              <div class='row ml-2'>
                <div class='col-md-10'>
                  <span class='lesson_time'>$start_time - $end_time</span>
                  <span>$class</span><br>
                  <span>$instructor_name</span><br>
                  <div id='accordion'>
                    <div>
                      <button class='btn text-left col-md-10 collapsed' data-toggle='collapse' data-target='#lessonDetail$schedule_id' aria-expanded='ture' aria-controls='lessonDetail$schedule_id'>
                        <span class='text-purple'> >> View Detail</span>
                      </button>
                      <div id='lessonDetail$schedule_id' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>
                        <div class=''>
                          <h5>$class</h5>
                          <p>$class_detail</p>
                          <p>$class_level</p>
                          <hr>
                          <h5>$instructor_name</h5>
                          <p>$instructor_detail</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='col-md-2'>";
                
                if($us_schedule == TRUE){
                  $us_schedule_id = $us_schedule["schedule_id"];
                  echo "<button class='btn btn-success px-4' disabled>booked</button>";   
                }else{
                    echo "<a href='userAction.php?actionType=useTicket&date=$lesson_date&scheduleID=$schedule_id' class='btn btn-outline-success px-4'>book</a>";
                }
                
                echo "</div>
              </div>";
            }
            
        }elseif(!isset($_SESSION["login"])){
          if(isset($_POST['search'])){
            $schedule = $user->getScheduleByDate();
          }elseif(isset($_POST["lessonSearchSpecific"])){
            $schedule = $user->getSpecificSchedule();
          }elseif(!isset($_POST['search'])){
            $schedule = $user->getScheduleInfomation();
          }
          
          foreach($schedule as $row){
            $schedule_id = $row["schedule_id"];
            $schedule_status = $row["status"];
            $lesson_date = $row["lesson_date"];
            $start_time = $row["start_time"];
            $end_time = $row["end_time"];
            $class = $row["class_type"];
            $class_detail = $row["class_detail"];
            $class_level = $row["class_level"];
            $instructor_name = $row["instructor_Fname"]." ".$row["instructor_Lname"];
            $instructor_detail = $row["instructor_detail"];
            
            echo
             "<h4 class='mt-3 ml-2'>$lesson_date</h4>
              <div class='row ml-2'>
                <div class='col-md-10'>
                  <span class='lesson_time'>$start_time - $end_time</span>
                  <span>$class</span><br>
                  <span>$instructor_name</span><br>
                  <div id='accordion'>
                    <div>
                      <button class='btn text-left col-md-10 collapsed' data-toggle='collapse' data-target='#lessonDetail$schedule_id' aria-expanded='ture' aria-controls='lessonDetail$schedule_id'>
                        <span class='text-purple'> >> View Detail</span>
                      </button>
                      <div id='lessonDetail$schedule_id' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>
                        <div class=''>
                          <h5>$class</h5>
                          <p>$class_detail</p>
                          <p>$class_level</p>
                          <hr>
                          <h5>$instructor_name</h5>
                          <p>$instructor_detail</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='col-md-2'>";
                if($schedule_status == "going"){
                    echo "<button class='btn btn-warning px-4' disabled>$schedule_status</but>";
                  }else{
                    echo "<button data-toggle='modal' data-target='#loginModal' class='btn btn-outline-success px-4'>book</button>";
                  }
            echo "</div>
              </div>";
            }
          }
        ?>
      </div>
    </div>
  </section>