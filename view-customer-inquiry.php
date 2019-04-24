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
        $query = "UPDATE inquiry SET accepted_by_customer = $status WHERE id=$id";

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
                  <input type="radio" name="status" value="1"> Accept  
                  <input type="radio" name="status" value="0"> Reject<br>

              </div>
            
            </div>
            <div ><button class="text-left" type="submit">Submit</button> </div>
          </form>
        </div>

      </div>
    </section><!-- #login -->

<?php
    include("includes/footer.php");
?>