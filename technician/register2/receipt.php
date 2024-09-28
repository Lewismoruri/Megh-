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
            <center><h3>DESIGN STUDIO</h3></center>
                    <center><h4>Email: design@studio.co.ke<br>
                    Tel : +254 721 396 167
                </h4></center>
               
                    
            </h5>
                  
    </div>
    <div class="container">
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
                                            
                                            <th><font color="red">PRODUCT DETAILS</font></th>
                                            <th><font color="red">PAYMENT DETAILS</font></th>
                                        </tr>
                                    </thead>
                                    <tbody

<?php 
$id=$_GET['id'];                                     
$sql = "SELECT *FROM requests  where id='$id' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                        <h5><b>Customer Details</b>
                                        <b>Name :</b><?php echo htmlentities($result->firstname);?> <?php echo htmlentities($result->lastname);?><br>
                                        <b>Email :</b><?php echo htmlentities($result->email);?><br>
                                        <b>Phone :</b><?php echo htmlentities($result->phone);?><br></h5>
                
                                        
                                            <td class="center"><?php echo htmlentities($cnt);?></td>                                     
                                            <td class="center">
                                                <b>Product Name :</b><?php echo htmlentities($result->pname);?><br>
                                            <b>Ordered Quantity :</b><?php echo htmlentities($result->quantity);?> Pieces<br>    
                                           
                                            <td class="center">
                                            <b> Price :</b>Ksh <?php echo htmlentities($result->charges);?><br> 
                                            <b> Delivery Fee :</b>Ksh <?php echo htmlentities($result->delfee);?><br> 
                                             <b>Payment Status :</b>   <?php echo htmlentities($result->payStatus);?><br> 
                                            <b>Transaction Code :</b><?php echo htmlentities($result->Ref);?><br> 
                                            <b>Date :</b><?php echo htmlentities($result->date_created);?><hr>
                                            <b>TOTAL AMOUNT :Ksh </b><?php echo htmlentities($result->delfee)+($result->charges);?>
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
 
    
</body>

</html>
