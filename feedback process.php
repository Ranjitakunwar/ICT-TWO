<?php
    session_start();
    include("db/db_connection.php");
    include("includes/header.php");
?>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>
<?php
if(isset($_POST['name'], $_POST['email'], $_POST['comment'])) {
    //make the database connection
    $conn  = db/db_connection.php();
    $name = $conn -> real_escape_string($_POST['name']);
    $email = $conn -> real_escape_string($_POST['email']);
    $comment = $conn -> real_escape_string($_POST['comment']);
    //create an insert query
    $sql = "insert into feedback (name, email, comment) 
			VALUES ('$name', '$email', '$comment')";
    //execute the query
    if($conn -> query($sql))
    {
        echo "<div class=\"container\">";
        echo "<p>Thank you very much.</p>";
        echo "</div>";
    }
    $conn -> close();
}
else {
    die("Input error");
}
</body>
</html>
<?php
    include("includes/footer.php");
?>

