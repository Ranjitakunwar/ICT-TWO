<?php
    session_start();
    session_destroy();
    unset($_SESSION['lname']);
    unset($_SESSION['fname']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    unset($_SESSION['role']);
    header('location:login.php');

?>