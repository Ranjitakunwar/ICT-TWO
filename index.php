<?php
    session_start();
    include("db/db_connection.php");
    include("includes/header.php");
?>

<!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <h2>Making <span>your ideas</span><br>happen!</h2>
      <div>
          <a href="register.php" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('assets/img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/5.jpg');"></div>
    </div>

  </section><!-- #intro -->
  


    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="assets/img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>We are here to help</h2>
            <h3></h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i>Even a small problem with any part of your computers can adversely affect systems and servers and bring your business to a virtual halt. As your IT partner, you can count on us to diligently monitor your system and often discover and resolve problems before you were even aware there was one. Our vigilance allows us to react and quickly fix problems so you can continue your work without missing a beat.</li>
              <li><i class="ion-android-checkmark-circle"></i>We are very proactive in preventing technical issues before they arise.</li>
              <li><i class="ion-android-checkmark-circle"></i>Support for your existing IT department</li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- #about -->

   
    

    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Testimonials</h2>
          <p>We continue to impress with the levels of service and professionalism at I.T. Invoicing. We provide excellent competitive Business IT Support with outstanding technical backup.</p>
        </div>
        <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Thanks to the great team professionals for a great job. This wasn’t easy and they were patient and helpful throughout.
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>CEO &amp; Founder</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Our experience with our previous service provider was so frustrating that we were nervous about selecting a new provider. We searched for a cost-effective and service oriented company to manage our systems. We are so happy with the service. THUMBS UP. 
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                I just wanted to send a quick note of KUDOS to the awesome IT guys at IT Invoicing. They are always friendly, professional, and can fix anything! 
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
               IT Invoicing is the best IT solution provider. They understood the needs and provided solutions we had not considered. I cannot say enough good things about the fast, exemplary customer service they provide. 
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
              I am so happy that I chose IT Invoicing to solve my problems. They are super friendly and solved my problem way too fast. 
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
            </div>

        </div>

      </div>
    </section><!-- #testimonials -->

   

  </main>

<?php
    include("includes/footer.php");
?>

