<?php
    session_start();
    include("../db/db_connection.php");
   
    
    include("includes/header.php");
    $id = $_GET['id'];
    $query_sent = FALSE;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $contractor=$_POST['contractor'];
        $price=$_POST['price'];
        $admin_msg=$_POST['admin_msg'];
        $query = "UPDATE inquiry SET contractor_id= '$contractor', cost='$price',Admin_response='$admin_msg' where id=$id";
             

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
               <strong>Success!</strong> Updated.
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
             Contarctor ID 	: 
             <input type="text" class="form-control" name="contractor" value="<?= $inquiry[4] ?>"  required />
              </div>
            </div>
            <div class="form-row">
             <div class="form-group col-md-6">
             Estimated Price: 
             <input type="number" class="form-control" name="price" value="<?= $inquiry[6] ?>"  required />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                Admin Message :
                <br> 
                  <textarea name="admin_msg" class="form-control" rows="5" ><?= $inquiry[10] ?></textarea>
              </div>
            
            </div>
            
            <div ><button class="text-left" type="submit">Save</button> </div>
          </form>
        </div>

      </div>
    </section><!-- #login -->

<?php
    include("includes/footer.php");
?>