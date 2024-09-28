<?php

if(!isset($_SESSION['EMAIL'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Pending Payments

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Pending Payments

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#:</th>
<th>First Name:</th>
<th>Last Name:</th>
<th>Email:</th>
<th>Address:</th>
<th>Phone Number:</th>
<th>Gender:</th>
    <th>Action:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i=0;

$get_c = "select * from tblsummary where PAYMENT_STATUS='Pending'";

$run_c = mysqli_query($con,$get_c);

while($row_c=mysqli_fetch_array($run_c)){

    $c_id = $row_c['SUMMARYID'];

    $FNAME = $row_c['FNAME'];
    
    $LNAME = $row_c['LNAME'];
    
    $EMAIL = $row_c['EMAIL'];
    $CITYADD = $row_c['CITYADD'];
    
    $PHONE = $row_c['PHONE'];
    
    $GENDER = $row_c['GENDER'];

$i++;




?>

<tr>
<td><?php echo $i; ?></td>

<td><?php echo $FNAME; ?></td>

<td><?php echo $LNAME; ?></td>

    <td><?php echo $EMAIL; ?></td>

    <td><?php echo $CITYADD; ?></td>

<td><?php echo $PHONE; ?></td>

    <td><?php echo $GENDER; ?></td>


<td>

<a href="index.php?customer_suspend=<?php echo $c_id; ?>" >

<i class="fa fa-edit" ></i> Suspend

</a>


</td>


</tr>

<?php } ?>


</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 

<?php } ?>