<?php require_once('header.php'); ?>



<?php
	$statement = $pdo->prepare("UPDATE requests SET status=? WHERE id=?");
	$statement->execute(array($_REQUEST['task'],$_REQUEST['id']));

	header('location: indexsupplies.php');
?>