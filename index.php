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
      <h2>Simple <span>Solutions for Complex</span><br>Problems!</h2>
      <div>
          <a href="register.php" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('assets/img/intro-carousel/6.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/7.jpg');"></div>
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
          <div class="col-lg-6 imag1">
            <img src="assets/img/imag1.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2></h3>

            

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
          <p>We continue to impresse with the levels of service and professionalism at I.T. Invoicing. They provide excellent competitive Business IT Support with outstanding technical backup</p>
        </div>
        <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                I.T. Invoicing  worked with us to define the IT strategy that has given us the flexibility & scalability we needed as the business has grown. arc I.T. are the perfect IT support company for us, speaking plain English, without the jargon and responds quickly  when the need arises – 90% of our issues are analysed & resolved remotely without needing to get an engineer onsite. We’ve found them to be professional, reliable and responsive - and their open approach and predictable costs helps us immensely.”
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
              <h3>Mr. Smith</h3>
              <h4>Business Solutions</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                IT Invoicing have been helping us with all our IT support & we can fully recommend their professional friendly staff. Always available on the phone & when have called them out they have always managed to fix our problems. We are very pleased since we changed our IT support supplier.
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                “The best thing we ever did was have ACE IT Solutions handle our systems and back up. We appreciate their support and would recommend them to anyone.”
                <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
            </div>

        </div>

      </div>
    </section><!-- #testimonials -->

   

  </main>

<?php
    include("includes/footer.php");
?>

