<?php require_once('header.php'); ?>


<?php
	$statement = $pdo->prepare("UPDATE tbl_bookings SET sup_confirm=? WHERE id=?");
	$statement->execute(array($_REQUEST['task'],$_REQUEST['id']));

	header('location: managebookings.php');
?>