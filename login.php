<?php
    session_start();
    include("db/db_connection.php");
    
    if (isset($_SESSION['fname']) && isset($_SESSION['lname'])) {
        header('location:index.php');
    }
    
    $is_login_failed = FALSE;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE email='$username' AND password='$password'  LIMIT 1";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        
        if ($row != null) {
            $_SESSION['fname'] = $row[1];
            $_SESSION['lname'] = $row[2];
            $_SESSION['email'] = $row[3];
            $_SESSION['id'] = $row[0];
            $_SESSION['role'] = $row[7];
            
            mysqli_close($con);
            header('location:index.php');
        }else{
           $is_login_failed = TRUE;
           mysqli_close($con);
        }
    }
    
    include("includes/header.php");
?>

<!--==========================
      Login Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Login</h2>
          <?php if($is_login_failed){ ?>
            <div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Wrong username or password.
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="container">
        <div class="form">
            <form action="login.php" method="post" name="login_form" role="form" class="contactForm">
           
             <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="username" id="email" placeholder="Your Email" required/>
              </div>
            
            </div>
            <div class="form-row">
             <div class="form-group col-md-6">
                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password"  required />
              </div>
            </div>
           <div> New here? <a href="register.php">Sign Up Now</a></div><br>
            <div ><button class="text-left" type="submit">Login</button> <a href="#" class="text-danger text-right"> Forget Password?</a></div>
          </form>
        </div>

      </div>
    </section><!-- #login -->
    
<?php
    include("includes/footer.php");
?>

