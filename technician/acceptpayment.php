<?php require_once('header1.php'); ?>

<

<?php
	$statement = $pdo->prepare("UPDATE requests SET payStatus=? WHERE id=?");
	$statement->execute(array($_REQUEST['task'],$_REQUEST['id']));

	header('location: approvedpayment.php');
?>