<?php
    session_start();
    include("db/db_connection.php");
    
    if (!isset($_SESSION['fname']) && !isset($_SESSION['lname'])) {
        header('location:login.php');
    }
    
    include("includes/header.php");
    
    $id = $_GET['id'];
    
    $query_sent = FALSE;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $status = $_POST['status'];
        $query = "UPDATE inquiry SET status = $status WHERE id=$id";

        $result = mysqli_query($con, $query);
        
        if ($result) {
            $query_sent = TRUE;
        }
    }

    $inquiry = null;
    // getting all inquiries of user
    $query = "SELECT * FROM inquiry WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $inquiry = mysqli_fetch_row($result);
?>

<!--==========================
      Login Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>View Inquiry</h2>
          <?php if($query_sent){ ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Your Query successfully sent.
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="container">
        <div class="form">
            <form action="" method="post" class="contactForm">
             <div class="form-row">
              <div class="form-group col-md-6">
              Type:
              <input type="text" class="form-control" name="type" id="type" value="<?= $inquiry[2] ?>" disabled required/>
              </div>
            
            </div>
             <div class="form-row">
              <div class="form-group col-md-6">
                Description :
                <br> 
                  <textarea name="desp" class="form-control" rows="5" disabled=""><?= $inquiry[3] ?></textarea>
              </div>
            
            </div>
            <div class="form-row">
             <div class="form-group col-md-6">
             Estimated Price: 
             <input type="number" class="form-control" name="price" value="<?= $inquiry[6] ?>" disabled  required />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">

                Admin Message :
                <br> 
                  <textarea name="admin_msg" class="form-control" rows="5" disabled><?= $inquiry[10] ?></textarea>
              </div>
            
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                Status:
                  <!-- Status Values: 0=pending, 1=estimated, 2=accepted, 3= rejected, 4=in progress, 5=completed, 6=cancelled  -->
                <?php 
                  if($inquiry[5] == 0){
                    echo 'Pending';
                  }else if($inquiry[5] == 1){ 
                    //mean inquiry has been accepted, now customer have to accept or reject the estimate
                ?>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="2" <?=  ($inquiry[5]== 2) ?  "checked" : "" ;  ?> > Accept 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <input type="radio" name="status" value="3" <?=  ($inquiry[5]== 3) ?  "checked" : "" ;  ?> > Reject<br>

                <?php 
                  }else{
                    //if user has already accepted/rejected the status then don't allow customer to change the option
                      if($inquiry[5] == 2){
                        echo "Accepted";
                      }else if($inquiry[5] == 3){
                        echo "Rejected";
                      }else if($inquiry[5] == 4){
                        echo "In Progress";
                      }else if($inquiry[5] == 5){
                        echo "Completed";
                      }else if($inquiry[5] == 6){
                        echo "Cancelled";
                      } 
                  }
                ?>
                
              </div>
            
            </div>
            <?php 
              if($inquiry[5] == 1){
                echo '<div ><button class="text-left" type="submit">Submit</button> </div>';
              }
            ?>
            
          </form>
        </div>

      </div>
    </section><!-- #login -->

<?php
    include("includes/footer.php");
?>