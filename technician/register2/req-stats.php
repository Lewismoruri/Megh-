<?php require_once('header.php'); ?>


<?php
	$statement = $pdo->prepare("UPDATE requestsmat SET status=? WHERE id=?");
	$statement->execute(array($_REQUEST['task'],$_REQUEST['id']));

	header('location: mytendersapproved.php');
?>