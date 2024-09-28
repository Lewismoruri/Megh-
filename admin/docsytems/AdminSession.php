<?php
    session_start();
    if($_SESSION['alogin']!='email')
    {
        header('location:Login/login.php');
        exit();
    }
    include 'connection.php'
?>
