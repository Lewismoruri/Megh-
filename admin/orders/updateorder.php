<?php require_once('header1.php'); ?>


<?php
	$statement = $pdo->prepare("UPDATE tblsummary SET ORDEREDSTATS=? WHERE SUMMARYID=?");
	$statement->execute(array($_REQUEST['task1'],$_REQUEST['SUMMARYID']));

	header('location: index.php');
?>