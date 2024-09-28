<?php require_once('header1.php'); ?>

<

<?php
	$statement = $pdo->prepare("UPDATE tblsummary SET SHIPPING_STATUS=? WHERE SUMMARYID=?");
	$statement->execute(array($_REQUEST['task'],$_REQUEST['SUMMARYID']));

	header('location: pendingdeliveries.php');
?>