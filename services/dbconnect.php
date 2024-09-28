<?php

$servername="localhost";
$uname="root";
$pass="";
$db="megh_db";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Connection Failed");
}

?>