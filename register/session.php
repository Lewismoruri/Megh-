<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['CUSID']['CUSTOMERID']) || trim($_SESSION['CUSID']['CUSTOMERID']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM tblcustomer WHERE CUSTOMERID = '".$_SESSION['CUSID']['CUSTOMERID']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>