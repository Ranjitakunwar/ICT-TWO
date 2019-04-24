<?php
    session_start();
    include("../db/db_connection.php");
    
    if (!isset($_SESSION['fname']) && !isset($_SESSION['lname'])) {
        header('location:admin/admin-login.php');
    }
    
    include("includes/header.php");
    
    $inquiries = null;
    $sql = "SELECT * FROM inquiry ";
    $inquiries = mysqli_query($con, $sql);
?>
 <!--==========================
      Dashboard Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Dashboard</h2>
        </div>
       
        	<div class="row">
        		<div class="col-md-12 py-5">
        			 <table class="table">
					  <thead id="table-header">
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">  customerID    </th>
					      <th scope="col">Query Type</th>
					      <th scope="col">Query</th>
					      <th scope="col">Contractor ID</th>
					      <th scope="col">Cost</th>
					      <th scope="col">accepted_by_custome</th>
					      <th scope="col">accpted_by_contractor</th>
					      <th scope="col">Status</th>
					      

					    </tr>
					  </thead>
					  <tbody>
					    <?php if (mysqli_num_rows($inquiries)) {
                    while($row = mysqli_fetch_assoc($inquiries)) { ?>
                        <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["customer_id"] ?></td>
                            <td><?= $row["query_type"] ?></td>
                            <td><?= $row["query"] ?></td>
                           
                            <td><?= $row["contractor_id"] ?></td>
                            <td><?= $row["cost"] ?></td>
                            
                            <td><?= $row["accepted_by_customer"] ?></td>
                            <td><?= $row["accpted_by_contractor"] ?></td>
 							<td><?php if($row["status"] == 0){
                                echo "<a href=\"view-admin-inquiry.php?id=".$row['id']."\">Pending</a>";
                            }else if($row["status"] == 1){
                                echo "Estimated";
                            }else if($row["status"] == 2){
                                echo "In Progress";
                            }else if($row["status"] == 3){
                                echo "Completed";
                            } ?></td>
                            
                        </tr>
                <?php } } ?>
					  </tbody>
					</table>
        		</div>

        </div>

      
    </section><!-- #services -->
  </main>
<?php
    include("includes/footer.php");
?>

