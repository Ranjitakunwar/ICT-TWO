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

        $inquiry_type = $_POST['subject'];
        $message = $_POST['message'];
        $current_time = date("Y-m-d h:i:sa");
        
        $query = "INSERT INTO inquiry(customer_id,query_type,query,status,created_at,updated_at)"
                . " VALUES('$c_id','$inquiry_type','$message','0','$current_time','$current_time')";
        
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $query_sent = TRUE;
        }
    }
    
    $inquiries = null;
    // getting all inquiries of user
    $sql = "SELECT * FROM inquiry WHERE customer_id='$c_id'";
    $inquiries = mysqli_query($con, $sql);
    
    $inquiries_assigned_to_contractor = null;
    // getting all inquiries of user
    $sql2 = "SELECT * FROM inquiry WHERE contractor_id='$c_id'";
    //var_dump($sql2);
    $inquiries_assigned_to_contractor = mysqli_query($con, $sql2);
    
?>

 <!--==========================
      Enquiry Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Inquiry</h2>
          <?php if($query_sent){ ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Your Query successfully sent.
            </div>
          <?php } ?>
        </div>

       
      </div>

   
    <?php  if($_SESSION['role'] === 'customer'){ ?>
      <div class="container">
        <div class="form">
            <form action="inquiry.php" method="post" name="enquiry_form" role="form" class="contactForm">
           
             <div class="form-row">
              <div class="form-group col-md-6">
                <select class="form-control" name="subject" id="enquiry">
                  <option value="hardware">Hardware</option>
                  <option value="software">Software</option>
                  <option value="both">Both</option>
                </select>
                <div class="validation"></div>
              </div>
            
            </div>
            <div class="form-row">
             <div class="form-group col-md-6">
             <textarea class="form-control" name="message" rows="9" placeholder="Message" required></textarea>
              </div>
            </div>
            <div ><button class="text-left" type="submit">Add Enquiry</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
    <?php } ?>
    <section>
      <div class="container">
        <table class="table">
            <thead id="table-header">
              <tr>
                <th scope="col">Inquiry Type</th>
                <th scope="col">Inquiry</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
               
                <?php 
                    if($_SESSION['role'] === 'customer'){
                        if (mysqli_num_rows($inquiries)) {
                        while($row = mysqli_fetch_assoc($inquiries)) { ?>
                        <tr>
                            <td><?= $row["query_type"] ?></td>
                            <td><?= $row["query"] ?></td>
                            <td><?php if($row["status"] == 0){
                                echo "<a href=\"view-customer-inquiry.php?id=".$row['id']."\">Pending</a>";
                            }else if($row["status"] == 1){
                                echo "Estimated";
                            }else if($row["status"] == 2){
                                echo "In Progress";
                            }else if($row["status"] == 3){
                                echo "Completed";
                            } ?>
                            </td>
                        </tr>
                    <?php } } } else{
                        if (mysqli_num_rows($inquiries_assigned_to_contractor)) {
                        while($row2 = mysqli_fetch_assoc($inquiries_assigned_to_contractor)) {?>
                        <tr>
                            <td><?= $row2["query_type"] ?></td>
                            <td><?= $row2["query"] ?></td>
                            <td><?php if($row2["status"] == 0){
                                echo "<a href=\"view-customer-inquiry.php?id=".$row2['id']."\">Pending</a>";
                            }else if($row2["status"] == 1){
                                echo "Estimated";
                            }else if($row2["status"] == 2){
                                echo "In Progress";
                            }else if($row2["status"] == 3){
                                echo "Completed";
                            } ?>
                            </td>
                        </tr>
                        
                    <?php }}} ?>
            </tbody>
        </table>
      </div>
    </section>
  </main>

<?php
    include("includes/footer.php");
?>
