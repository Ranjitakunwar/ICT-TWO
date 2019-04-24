<?php
    session_start();
    include("db/db_connection.php");
    
    if (isset($_SESSION['fname']) && isset($_SESSION['lname'])) {
        header('location:index.php');
    }
    
    include("includes/header.php");
    
    $registered = FALSE;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $password = $_POST['pass'];
        $current_time = date("Y-m-d h:i:sa");
        $query = "INSERT INTO users(fname, lname, email, phno, password, role) "
                . "VALUES('$fname', '$lname', '$email', '$phno', '$password', 'customer')";
        
        if (!$result = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
	}
        mysqli_close($con);
	$registered = TRUE;
    }
    
?>

<!--==========================
      Register Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Sign up</h2>
          <?php if($registered){ ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> You are successfully registered with our system.
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="container">
        <div class="form">
         
            <form action="register.php" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="text" name="fname" class="form-control" id="firstname" placeholder="First Name" required />
              </div>
              <div class="form-group col-md-6">
                  <input type="text" name="lname" class="form-control" id="lastname" placeholder="Last Name" required />
              </div>
            </div>
             <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
              </div>
            <div class="form-group col-md-6">
                <input type="phone" class="form-control" name="phno" id="phone" placeholder="Your Phone Number" required= />
            </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="password" class="form-control" name="pass" id="password" placeholder="Your Password" required/>
              </div>
            <div class="form-group col-md-6">
                <input type="password" class="form-control" name="cpass" id="cpassword" placeholder="Confirm Password" required />
              </div>
            </div>
           
                <div class="text-center"><button type="submit" name="submit">Sign Up</button></div>
          </form>
        </div>

      </div>
    </section><!-- #register -->
    
<?php
    include("includes/footer.php");
?>
