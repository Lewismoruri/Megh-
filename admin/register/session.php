<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['USERID']) || trim($_SESSION['USERID']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM tbluseraccount WHERE USERID = '".$_SESSION['USERID']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>