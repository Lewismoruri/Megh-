<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['id']) || trim($_SESSION['id']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['id']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>