<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['EMAIL']) || trim($_SESSION['EMAIL']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM tbluseraccount WHERE EMAIL = '".$_SESSION['EMAIL']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>