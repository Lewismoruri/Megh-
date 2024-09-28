<?php require_once('header1.php'); ?>

<

<?php
	$statement = $pdo->prepare("UPDATE tblsummary SET ORDEREDREMARKS='Delivery Completed' , SHIPPING_STATUS=? WHERE SUMMARYID=?");
	$statement->execute(array($_REQUEST['task'],$_REQUEST['SUMMARYID']));
	$statement->execute(array($_REQUEST['task2'],$_REQUEST['SUMMARYID']));

	header('location: pendingdeliveries.php');
?>