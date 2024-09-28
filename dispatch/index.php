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


$get_pendingshipment = "select * from tblsummary where SHIPPING_STATUS='Not Yet Shipped' AND DRIVER='Not Assigned'";
$run_pendingshipment = mysqli_query($con,$get_pendingshipment);
$count_pendingshipment = mysqli_num_rows($run_pendingshipment);

$get_allocations = "select * from tblsummary where DRIVER!='Not Assigned' and SHIPPING_STATUS='Goods on Transit'";
$run_allocations = mysqli_query($con,$get_allocations);
$count_allocations = mysqli_num_rows($run_allocations);

$get_completed = "select * from tblsummary where SHIPPING_STATUS='Goods Delivered'";
$run_completed = mysqli_query($con,$get_completed);
$count_completed = mysqli_num_rows($run_completed);



?>


<!DOCTYPE html>
<html>

<head>

<title>Mamba Admin Panel</title>

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