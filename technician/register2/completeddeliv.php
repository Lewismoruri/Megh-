<?php
session_start();
error_reporting(0);
include('config.php');
// code for block student    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update requests set status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:allocatedriver.php');
}



//code for active students
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status='Goods On Transit';
$sql = "update requests set status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:allocatedriver.php');
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
                <h3 > <font color="black">COMPLETED SPECIAL REQUEST :</font></h3>
                  
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
                                            <th><font color="black">CUSTOMER DETAILS</font></th>
                                            <th><font color="black">PRODUCT DETAILS</font></th>
                                            <th><font color="black">LOCATION DETAILS</font></th>
                                            <th><font color="black">ORDER STATUS</font></th>
                                            <th><font color="black">DRIVER ASSIGNED</font></th>
                                            <th><font color="black">CUSTOMER REMARKS</font></th>
                                        </tr>
                                    </thead>
                                    <tbody

<?php                                      $sql = "SELECT *FROM requests where status='Delivered'  ";
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
                                                <b>Name :</b><?php echo htmlentities($result->firstname);?> <?php echo htmlentities($result->lastname);?><br>
                                                <b>Email :</b><?php echo htmlentities($result->email);?><br>
                                                <b>Phone :</b><?php echo htmlentities($result->phone);?><br>
                                        </td>                                     
                                            <td class="center">
                                                <b>Product Name :</b><?php echo htmlentities($result->pname);?><br>
                                            <b>Ordered Quantity :</b><?php echo htmlentities($result->quantity);?><br>    
                                            <b>Description :</b><?php echo htmlentities($result->specs);?><br> 
                                            <b>Required By :</b><?php echo htmlentities($result->DueDate);?></td>  
                                            <td class="center">
                                                <?php echo htmlentities($result->county);?> County,<br>
                                                <?php echo htmlentities($result->location);?>
                                            </td>    
                                            <td class="center"><?php echo htmlentities($result->status);?></td> 
                                            <td class="center">
                                            <?php echo htmlentities($result->driver);?><br>
                                            <?php 
                                            if($result->driver=='')
 {?>
<a href="assigndriver.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-primary btn-sm"> Assign</button>
<?php } else {?> <?php } ?>
                                            </td>
                                            <td class="center">
                                            <?php echo htmlentities($result->custremark);?><br>
                                            </td>   
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-sm btn-primary"><a href="../dispatch_panel.php"><font color="white">Back</font></a></button>
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
