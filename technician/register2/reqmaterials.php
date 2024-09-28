<?php
session_start();
error_reporting(0);
include('config.php');

// code for block student    
if(isset($_GET['inid']))
{
$Id=$_GET['inid'];
$status=Received;
$sql = "update requestsmat set status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$Id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:supplies.php');
}



//code for active students
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=Confirmed;
$sql = "update requestsmat set status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:supplies.php');
}


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
               <center> <h3 > <font color="black">REQUESTED MATERIAL LIST:</font></h3></center>
                  
    </div>
  
        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       <!-- <button class="btn btn-warning"><a href="supRequestmat.php"> <font color="black"><i class="fa fa-pencil"></i>&nbsp;Request</font></a></button>-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><font color="black">Product Name</font></th>
                                            <th><font color="black">Quantity (kgs)</font></th>
                                            <th><font color="black">Description</font></th>
                                            <th><font color="black">Status</font></th>  
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * from requestmateriallist ";
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
                                            <td class="center"><?php echo htmlentities($result->varietyName);?></td>      
                                            <td class="center"><?php echo htmlentities($result->quantity);?></td>  
                                            <td class="center"><?php echo htmlentities($result->specs);?></td>         
                                            <td class="center">
<?php if($result->status=='Released and Update')
 {?>
Approved
<?php } else {?> <?php } ?>

<?php if($result->status==Supplied)
 {?>
<a href="supplies.php?inid=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-success btn-sm"> Received</button>
<?php } else {?> <?php } ?>

<?php if($result->status==Received)
if($result->remark=='')
 {?>
<a href="addremark.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-warning btn-sm"> Add Remark</button>
<?php } else {?> <?php } ?>

<?php if($result->status==Received)
 {?>
	<a href="update.php?varietyName=<?php echo $result->varietyName; ?>&task=Received and Update" class="btn btn-danger btn-xs" style="width:100%;margin-bottom:4px;">Update</a>
<?php } else {?> <?php } ?>

                                          
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-warning"><a href="../supervisor_panel.php"> <font color="black"><i class="fa fa-arrow-left"></i>&nbsp;Back</font></a></button>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>
    <div class="col-md-12">

    </div>
    </div>
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
