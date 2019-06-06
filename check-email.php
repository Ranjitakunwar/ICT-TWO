<?php 
  session_start();
  include("db/db_connection.php");
  $email=$_POST['email'];
  $sql="SELECT  * FROM users WHERE email='".$email."'";
  $rs=mysqli_query($con,$sql);
    if(mysqli_num_rows($rs)>0){
        echo "yes";
    }
    
?>