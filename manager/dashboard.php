<?php



if(!isset($_SESSION['EMAIL'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>


<!DOCTYPE HTML>
    <html>

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manager Login</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" >

        <link rel="stylesheet" href="css/login.css" >

    </head>

    <body style="background-color:white">
<div class="container"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->



</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<div class="row" style="background-color:white"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts --><br><br>
<h3 class=""> <font color="black"><i class="fa fa-dashboard"> Dashboard </i> </font></h3>

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<div class="row" style="background-color:white"><!-- 2 row Starts -->

<div class="col-lg-9 col-md-9"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-danger"><!-- panel panel-primary Starts -->

<div class="panel-heading" style="background-color:maroon"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->



</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge" style="color:white"> <?php echo $count_pendingpayment; ?> </div>

<div style="color:white">Pending Bookings</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="managebookings.php">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->




<div class="col-lg-3 col-md-4"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-success"><!-- panel panel-green Starts -->

<div class="panel-heading" style="background-color:#0BF124"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->



</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge" style="color:black"> <?php echo $count_approvedpayment; ?> </div>

<div style="color:black">Completed Task(s)</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="approvedbookings.php">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-green Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->





<div class="col-lg-3 col-md-4"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-warning"><!-- panel panel-green Starts -->

<div class="panel-heading" style="background-color:#3C30CF"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->


</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge" style="color:white"> <?php echo $count_rejectedpayment; ?> </div>

<div style="color:white">Inbox</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="register/rejectedrequest.php">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-green Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->

</body>

</html>





<?php } ?>