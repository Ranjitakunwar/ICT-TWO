<?php
    session_start();
    include("db/db_connection.php");
    include("includes/header.php");
?>
 <!--==========================
      Feedback Section
    ============================-->
		
		<div class="feedback-title">
			<h1>Say Hello</h1>
			<h2>We are always ready to serve you!</h2>
		</div>
<div class="feedback-form">
    <form id="feedback-form" method="post" action="feedback form handler.php">
	<input name="name" type="text" class="form-control" placeholder="Your Name" required>
	<br>
	<input name="email" type="email" class="form-control" placeholder="Your Email" required><br>
		
		<textarea name="message" class="form-control" placeholder="Message" row="4" required></textarea><br>
		
		
		<input type="submit" class="form-control submit" value="SEND MESSAGE">
	
	</form>
</div>
<?php
    include("includes/footer.php");
?>
