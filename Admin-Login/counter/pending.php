<?php

    $servername="localhost";
    $uname="root";
    $pass="";
    $database="megh_db";

    $conn=mysqli_connect($servername,$uname,$pass,$database);

if(!$conn){
    die("Connection Failed");
}

    $sql = "SELECT * FROM tblcustomer where STATUS='0'";
    $query = $conn->query($sql);
    echo "$query->num_rows";
?>