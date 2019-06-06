<?php
    session_start();
    include("db/db_connection.php");
    include("includes/header.php");

    $inquiry_id=$_GET['inquiry_id'];
    $sql=" SELECT * FROM inquiry where id=$inquiry_id Limit 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql2="SELECT * FROM users WHERE id=".$row['customer_id'];
    $result2 = mysqli_query($con, $sql2);
    $customer = mysqli_fetch_assoc($result2);
    $sql3="SELECT * FROM users WHERE id=".$row['contractor_id'];
    $result3 = mysqli_query($con, $sql3);
    $contractor = mysqli_fetch_assoc($result3);
?>
<!--==========================
      Invoice Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Invoice</h2>
          <p class="text-right"><i class="fas fa-print" style="font-size:50px" onclick="javascript:printDiv('invoice')"></i></p>
          <img src="" alt="" >
         
        </div>
        <div class="container" >
        <div class="card" id="invoice">

<div class="card-body">
<div class="row">
<div class="col-lg-6 mt-2">
<div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto">IT<span>Invoicing</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
</div>
<div class="col-lg-6">
<div class="float-right">
  <STRONG>Invoice</STRONG>
  <div>SRN# ITI-001<?= $row['id']?></div>
  <div>A.B.N  69234567812</div>
  <div>Contact  +61 43 1145654</div>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-4 mt-5 py-5">
<h6 class="mb-3"><b>Bill To:</b></h6>
<div><?=$customer['fname']." ".$customer['lname'] ?></div>

<div>Email: <?=$customer['email']?></div>
</div>
<div class="col-sm-4"></div>
<div class="col-sm-4 mt-5 py-5">
<div>Invoice Date: <?php date_default_timezone_set("Asia/Karachi");
                                $today = date("F j, Y - g:i a");
                                echo $today;?></div>
<div>Contractor: <?=$contractor['fname']." ".$contractor['lname']?></div>
<div>Status: 
  
<?php 
                                if($row["status"] == 0){
                                    echo "Pending";
                                }else if($row["status"] == 1){
                                    echo "Estimated";
                                }else if($row["status"] == 2){
                                    echo "Accepted";
                                }else if($row["status"] == 3){
                                    echo "Rejected";
                                }else if($row["status"] == 4){
                                    echo "In Progress";
                                }else if($row["status"] == 5){
                                    echo "Completed";
                                }else if($row["status"] == 6){
                                    echo "Cancelled";
                                } ?>
</div>
</div>
</div>

 <div class="mt-5">
 <p class="text-center"><strong>Service Details</strong></p>
 </div>
<div class="table-responsive-sm">
<table class="table table-striped">
<thead>

<tr>
<th>Service Type</th>
<th class="w-50">Query</th>
<th>Status</th>
<th >Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center"><?= $row['query_type']?></td>
<td class="left strong"><?= $row['query']?></td>



  <td class="center">
  <?php 
                                if($row["status"] == 0){
                                    echo "Pending";
                                }else if($row["status"] == 1){
                                    echo "Estimated";
                                }else if($row["status"] == 2){
                                    echo "Accepted";
                                }else if($row["status"] == 3){
                                    echo "Rejected";
                                }else if($row["status"] == 4){
                                    echo "In Progress";
                                }else if($row["status"] == 5){
                                    echo "Completed";
                                }else if($row["status"] == 6){
                                    echo "Cancelled";
                                } ?>
  </td>
  <td class="center"><?= $row['cost']?>$</td>

</tr>

</tbody>
</table>
</div>


<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<div class="mb-2">
<strong>Summary</strong>
</div>
<tr>
<td class="left">
<strong>GST included in Total</strong>
</td>
<td class="right">
<strong>$<?= $row['cost']/10;?></strong></td>
</tr>
<tr>
<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>$<?= $row['cost']?></strong>
</td>
</tr>
<td class="center">
<strong> Thank You for choosing us! </strong>
</td>

</tbody>
</table>

</div>

</div>

</div>
</div>
<br/><br/>
<?php
    include("includes/footer.php");
?>

