<section class="bg-light page-section" id="ticket">
    <div class="container mx-auto mb-5">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase mt-5">Ticket Infomation</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="card-group text-center">
        <?php
            foreach($ticket as $row){
            $ticket_id = $row["ticket_id"];
            echo
              "<div class='card'>
                <h3 class='card-header'>".$row["ticket_type"]." Lesson</h3>
                <div class='card-body d-flex flex-column'>
                    <h4 class='card-title'>$".$row["ticket_price"]."</h4>
                    <p class='card-text'>".$row["ticket_details"]."</p>";
            if(isset($_SESSION["loginid"])){
              echo "<a href='userAction.php?actionType=getTicket&ticketID=$ticket_id' type='submit' class='btn btn-success mt-auto mx-3 cursor text-white'>Get the ticket</a>
                </div>";
            }else{
              echo "<a data-toggle='modal' data-target='#loginModal' type='submit' class='btn btn-success mt-auto mx-3 cursor text-white'>Get the ticket</a>
                </div>";
            }
            echo "</div>";
        }
        ?>
        </div>
    </div>
  </section>