l<?php
session_start();
error_reporting(0);
include('inc/config1.php');





    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->

<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <center><h4 > <font color="green">MY BOOKINGS</font></h4></center>
                  
    </div>
    <div class="container">
</div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default"><br>
                    <div class="container">
                    <a href="../index.php"><font color="black"><button class="btn btn-sm btn-danger">Back</button></font></a>
</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><font color="green">Sevice Name</font></th>
                                            <th><font color="green">Number of Items</font></th>
                                            <th><font color="green">Details On Requested Service</font></th>
                                            <th><font color="green">Date Booked</font></th>
                                            <th><font color="green">Payment Details</font></th>
                                            <th><font color="green">Location Details</font></th>  
                                            <th><font color="green">Technician Allocated </font></th>  
                                            <th><font color="green">Customer Remark</font></th>  
                                            <th><font color="green">Booking Status</font></th> 
                                            <th><font color="green">Service Status</font></th> 
                                            <th><font color="green">Action</font></th> 
                                        </tr>
                                    </thead>
                                    <tbody>

<?php   
$id=$_GET['id'];      
$sql = "SELECT * FROM tbl_bookings  where  stu_id='".$_SESSION['CUSID']['CUSTOMERID']."'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>                                     
                                            <td class="center"><?php echo htmlentities($result->service);?></td>
                                            <td class="center"><?php echo htmlentities($result->qty);?></td>
                                            <td class="center"><?php echo htmlentities($result->duration);?></td>
                                            <td class="center"><?php echo htmlentities($result->bdate);?></td>
                                            <td class="center">
                                                <b>Charges per Item:</b>Ksh:&nbsp;<?php echo htmlentities($result->charges);?><br>
                                                <b>Commutation Fee :</b>Ksh:&nbsp;<?php echo htmlentities($result->fee);?><br>
                                                <b>Total Charges :</b>Ksh:&nbsp;<?php echo htmlentities($result->charges*$result->qty+($result->fee));?><br>
                                                <b>Transaction Code :</b>&nbsp;<?php echo htmlentities($result->transactioncode);?> <br>
                                                <b>Paid Via :</b>&nbsp;<?php echo htmlentities($result->method);?> <br>
                                                <b>Paid On :</b>&nbsp;<?php echo htmlentities($result->pdate);?><br>
                                                <b>Payment Status :</b>&nbsp;<?php echo htmlentities($result->payment_status);?><br>
                                            </td>
                                            <td class="center">
                                                <b>County Name :</b><?php echo htmlentities($result->county);?><br>
                                                <b>Location Details :</b><?php echo htmlentities($result->location);?>
                                        </td>
                                            <td class="center"><?php echo htmlentities($result->photographer);?></td>
                                            <td class="center"><?php echo htmlentities($result->cust_remark);?></td>
                                            <td class="center"><?php echo htmlentities($result->status);?>
                                            </td>
                                            <td class="center">
                                                <?php echo htmlentities($result->photographer_status);?>
                                            </td>
                                            <td class="center">
<?php if($result->transactioncode=='')
 {?>
<a href="paynow.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-success btn-sm"> Pay Now</button>
<?php } else {?>
  
    <?php } ?><br><br>
    <?php if($result->payment_status!=='Pending')
 {?>
<a href="mybookings-receipt.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-info btn-sm"> Receipt</button>
<?php } else {?>
  
    <?php } ?><br><br>
    <?php if($result->cust_remark=='')   
    if($result->transactioncode!=='')
    if($result->photographer_status=='Completed')
 {?>
<a href="addremark.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-warning btn-sm"> Add Remark</button>
<?php } else {?>
  
    <?php } ?><br><br>
    <?php if($result->cert=='Issued')  
    if($result->photographer_status=='Completed')
 {?>
<a href="certificate.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-danger btn-sm"> Certificate</button>
<?php } else {?>
  
    <?php } ?>
                                          
                                            </td>
                                           </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                      
                         
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>
    <div class="col-md-12">

    </div>
    </div>
    
     <!-- CONTENT-WRAPPER SECTION END-->
 
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    
</body>

</html>
<?php  ?>
