<?php
session_start();
error_reporting(0);
include('config.php');
// code for block student    
if(isset($_GET['inserviceid']))
{
$serviceid=$_GET['inserviceid'];
$status=0;
$sql = "update dance_services set status=:status  WHERE serviceid=:serviceid";
$query = $dbh->prepare($sql);
$query -> bindParam(':serviceid',$serviceid, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manage_dance_services.php');
}



//code for active students
if(isset($_GET['serviceid']))
{
$serviceid=$_GET['serviceid'];
$status=1;
$sql = "update dance_services set status=:status  WHERE serviceid=:serviceid";
$query = $dbh->prepare($sql);
$query -> bindParam(':serviceid',$serviceid, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manage_dance_services.php');
}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mamba</title>
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
                <h4 > <font color="black">MY SPECIAL ORDER(S) :</font></h4>
                  
    </div>
    <div class="container">
    <button class="btn btn-sm btn-primary"><a href="Request.php"><font color="white"><i class="fa fa-edit"></i>&nbsp;Make a Request</font></a></button>
</div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><font color="black">PRODUCT DETAILS</font></th>
                                            <th><font color="black">ORDER STATUS</font></th>
                                            <th><font color="black">DELIVERY INFO</font></th>
                                            <th><font color="black">DESIGNER ASSIGNED</font></th>
                                            <th><font color="black">DRIVER ASSIGNED</font></th>
                                            <th><font color="black">PAYMENT DETAILS</font></th>
                                            <th><font color="black">REMARK</font></th>
                                            <th><font color="black">CUSTOMER REMARK</font></th>
                                            <th><font color="black">NOTIFICATION</font></th>
                                            <th><font color="black">Action</font></th>
                                        </tr>
                                    </thead>
<?php                                      $sql = "SELECT *FROM requests where user='".$_SESSION['id']."'  ";
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
                                            <td class="center">
                                                <b>Product Name :</b><?php echo htmlentities($result->pname);?><br>
                                            <b>Ordered Quantity :</b><?php echo htmlentities($result->quantity);?><br>    
                                            <b>Description :</b><?php echo htmlentities($result->specs);?><br> 
                                            <b>Required By :</b><?php echo htmlentities($result->DueDate);?></td>  
                                            <td class="center"><?php echo htmlentities($result->status);?></td>  
                                            <td class="center">
                                                <?php echo htmlentities($result->county);?> County,<br>
                                                <?php echo htmlentities($result->location);?>
                                        </td>   
                                        <td class="center"><?php echo htmlentities($result->chocolatier);?></td> 
                                        <td class="center"><?php echo htmlentities($result->driver);?></td>  
                                            <td class="center">
                                            <b> Price :</b>Ksh <?php echo htmlentities($result->charges);?><br> 
                                            <b> Delivery Fee :</b>Ksh <?php echo htmlentities($result->delfee);?><br> 
                                             <b>Payment Status :</b>   <?php echo htmlentities($result->payStatus);?><br> 
                                            <b>Transaction Code :</b><?php echo htmlentities($result->Ref);?><br> 
                                            <b>Date :</b><?php echo htmlentities($result->date_created);?><hr>
                                            <b>TOTAL AMOUNT :Ksh </b><?php echo htmlentities($result->delfee)+($result->charges);?>
                                        </td>
                                        <td class="center"><?php echo htmlentities($result->remark);?></td> 
                                        <td class="center">
                                            <?php echo htmlentities($result->rate);?><br>
                                            <?php echo htmlentities($result->custremark);?>
                                    </td>  
                                    <td class="center " >
                                            <?php echo htmlentities($result->remark);?>
                                    </td>   
                                            <td class="center">
                                            <?php if($result->payStatus==Pending)
                                            if($result->Ref=='')
                                            if($result->charges!=='0')
 {?>
<a href="pay.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-primary btn-sm"> Pay</button>
<?php } else {?> <?php } ?>

<?php if($result->Ref!=='')
 {?>
<a href="receipt.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-primary btn-sm"> Receipt</button>
<?php } else {?> <?php } ?><br><br>

<?php 
                                            if($result->custremark=='')
 {?>
<a href="feedback.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-warning btn-sm"> Give Feedback</button>
<?php } else {?> <?php } ?>
                                            
                                            </td>   
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-sm btn-primary"><a href="../user_index.php"><font color="white">Back</font></a></button>
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
