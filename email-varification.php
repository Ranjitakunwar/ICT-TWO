<?php
    session_start();
    include("db/db_connection.php");
$email=base64_decode($_GET['v']);
$alreadyActive=false;
$active=false;
$sql="SELECT  email_verification FROM users WHERE email='".$email."' and email_verification=1";
$rs=mysqli_query($con,$sql);

if(mysqli_num_rows($rs)>0){
   
    $alreadyActive=true;
   
}else{
    
    if(mysqli_query($con,"UPDATE users SET email_verification=1 WHERE email='".$email."'")){
        
        $active=true;
       
    }
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>itinvoicing</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="assets/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
  <link href="assets/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/plugin/animate/animate.min.css" rel="stylesheet">
  <link href="assets/plugin/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/plugin/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/plugin/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="assets/plugin/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="fa fa-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto">IT<span>Invoicing</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
       <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li ><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
           <?php if (isset($_SESSION['fname']) && isset($_SESSION['lname'])) { 
             if($_SESSION['role']=='admin'){?>
               <li class="menu-has-children"><a href="#"><?= $_SESSION['fname']?></a>
            <ul >
                <li><a href="admin/contractor.php">Contractor</a></li>
                <li><a href="admin/dashboard.php">Inquiries</a></li>
                <li><a href="admin/logout.php">Logout</a></li>
              </ul>
           <?php }else{ ?>
            <li class="menu-has-children"><a href="#"><?= $_SESSION['fname']?> <?= $_SESSION['lname']?></a>
           <ul>
                      <!--<li><a href="profile.php">Profile</a></li>-->
                      <li><a href="inquiry.php">Inquiry</a></li>
                      <li><a href="profile.php">Update Profile</a></li>
                      <li><a href="logout.php">Logout</a></li>
                    </ul> 
                 </li>
         <?php  }
          }else{ ?>
                <li><a href="login.php">Login/SignUp</a></li>
           <?php } ?>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->

     
    </div>
  </header><!-- #header -->
<section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Email Varification</h2>
         
        </div>
      </div>
      <div class="container">
            <?php if($alreadyActive==true){
                echo "<h3> Your account is already activted.</h3>";
            }else if($active==true){
                echo "<h3> Your account is now activted you can login to avail our services.</h3>";
            } 
            
            ?>
            
        </div>

      </div>
    </section><!-- #register -->
    
<?php
    include("includes/footer.php");
?>
