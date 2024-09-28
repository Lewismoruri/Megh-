<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['CUSID']) || trim($_SESSION['CUSID'])){
		header('location: index.php');
	}

	$sql = "SELECT * FROM tblcustomer WHERE CUSTOMERID = '".$_SESSION['CUSID']['CUSTOMERID']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>