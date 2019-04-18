<?php
    session_start();
    include("db/db_connection.php");
    include("includes/header.php");
?>
<body onLoad="run_first()">
    <div class="container">
    	<form action="feedback process.php" method="post">
        <div class="bg-light mt-3 px-2 member_frm" style="border-radius: 5px; border: #0000ff solid thick">
          <h1>Feedback Form</h1>
            <h2>Please enter your feedback</h2>
            <p><i>Fields marked with an asterisk (*) must be entered.</i></p>
            <div class="row">
            	<div class="col">
                	<label for="name">Name:</label>
                    <input type="text" id="name" name="name" size="30" maxlength="50" />
                </div>
            </div>
            <div class="row">
            	<div class="col">
                	<label for="email">Email:</label>
                	<input type="email" id="email" name="email" size="30" maxlength="50" />
                </div>
            </div>
            <div class="row">
            	<div class="col">
                	<label for="comment">* Comment:</label>
                    <textarea id="comment" name="comment" rows="4" cols="30" required></textarea>
                </div>
            </div>

            <div class="row">
            	<div class="col">
                	<label>&nbsp;</label>
                    <input type="submit" id="submit" value="Submit" />
                    <input type="reset" id="reset" value="Clear Form" />
                </div>
            </div>
        </div>
        </form>
    </div>
<?php
    include("includes/footer.php");
?>

