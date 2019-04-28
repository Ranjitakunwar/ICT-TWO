<?php
    session_start();
    include("db/db_connection.php");
    
    if (!isset($_SESSION['fname']) && !isset($_SESSION['lname'])) {
        header('location:login.php');
    }
    
    include("includes/header.php");
    
    $query_sent = FALSE;
    $c_id = $_SESSION['id'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        
        $query = "UPDATE users SET fname='$fname', lname='$lname' WHERE id='$c_id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query_sent = TRUE;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
        }
    }
?>

 <!--==========================
      Enquiry Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Profile</h2>
          <?php if($query_sent){ ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Your profile updated successfully.
            </div>
          <?php } ?>
        </div>

       
      </div>

   
      <div class="container">
        <div class="form">
            <form action="profile.php" method="post" name="profile_form" role="form" class="contactForm">
             <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="fname" value="<?=$_SESSION['fname']?>" class="form-control" id="firstname" placeholder="First Name" required />
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="lname" value="<?=$_SESSION['lname']?>" class="form-control" id="lastname" placeholder="Last Name" required />
                </div>
              </div>
            <div ><button class="text-left" type="submit">Update Profile</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
    
  </main>

<?php
    include("includes/footer.php");
?>
