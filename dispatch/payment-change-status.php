<?php require_once('header1.php'); ?>

<

<?php
	$statement = $pdo->prepare("UPDATE tblsummary SET PAYMENT_STATUS=? WHERE SUMMARYID=?");
	$statement->execute(array($_REQUEST['task'],$_REQUEST['SUMMARYID']));

	header('location: payment.php');
?>