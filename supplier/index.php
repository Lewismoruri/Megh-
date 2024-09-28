<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['EMAIL'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

$admin_session = $_SESSION['EMAIL'];

$get_admin = "select * from tbluseraccount  where EMAIL='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$USERID = $row_admin['USERID'];

$EMAIL = $row_admin['EMAIL'];


$get_pendingpayment = "select * from requests WHERE status= 'Active' and supplier = '".$_SESSION['EMAIL']."'";
$run_pendingpayment = mysqli_query($con,$get_pendingpayment);
$count_pendingpayment = mysqli_num_rows($run_pendingpayment);

$get_approvedpayment = "select * from requests where status='Confirmed' or status='Approved' or status='Received' and supplier = '".$_SESSION['EMAIL']."'";
$run_approvedpayment = mysqli_query($con,$get_approvedpayment);
$count_approvedpayment = mysqli_num_rows($run_approvedpayment);

$get_rejectedpayment = "select * from requests where status='Supplied' and supplier = '".$_SESSION['EMAIL']."'";
$run_rejectedpayment = mysqli_query($con,$get_rejectedpayment);
$count_rejectedpayment = mysqli_num_rows($run_rejectedpayment);



?>


<!DOCTYPE html>
<html>

<head>

<title>Allwin</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >
<link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['pending_payments'])){

include("pending_payments.php");

}

if(isset($_GET['view_products'])){

include("view_products.php");

}

if(isset($_GET['view_Outproducts'])){

    include("view_Outproducts.php");

}


?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php } ?>