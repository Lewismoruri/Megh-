<?php
require_once('header1.php');
$SUMMARYID = $_GET['SUMMARYID'];
$statement = $pdo->prepare("UPDATE tblsummary SET PAYMENT_STATUS=? , ORDEREDSTATS='Confirmed' WHERE SUMMARYID=?");
$statement->execute(array($_REQUEST['task'], $SUMMARYID));
$stat = $pdo->prepare("SELECT t.PROID, t.PROQTY, c.ORDEREDQTY, c.ORDEREDNUM FROM `tblsummary` s ,`tblorder` c,`tblproduct` t
    WHERE s.`ORDEREDNUM`=c.`ORDEREDNUM` and c.`PROID`=t.`PROID` and s.SUMMARYID=?");
$stat->execute(array($SUMMARYID));
$result = $stat->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $ORDEREDQTY = $row['ORDEREDQTY'];
    $PROID = $row['PROID'];
    $PROQTY = $row['PROQTY'];
    $new_qty = $PROQTY;
    if ($new_qty < 0) {
        // Display error message and exit the loop
        $error_msg = "Error: Product quantity cannot be negative!";
        echo $error_msg;
        exit;
    } else {
        // Update product quantity
        $up = $pdo->prepare("UPDATE tblproduct SET PROQTY = ? WHERE PROID = ?");
        $up->execute(array($new_qty, $PROID));
    }
}
header('Location: payment.php');


?>
