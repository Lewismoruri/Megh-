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
                <center><h4 > <font color="black">REQUESTED TOOLS:</font></h4></center>
                  
    </div>
    
        </div>
            <div class="row">
                <div class="col-md-12">
                <a href="../index.php?dashboard"><button class="btn btn-danger">Back</button></a><br><br>
                <a href="Request2.php"><button class="btn btn-primary">Request Tools</button></a><br><br>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
               
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><font color="black"> Name</font></th>
                                            <th><font color="black">Requested Quantity</font></th>
                                            <th><font color="black">Description</font></th>
                                            <th><font color="black">Request Status</font></th>
                                            <th><font color="black">Action </font></th>
                                        </tr>
                                    </thead>
                                    <tbody

<?php                                      $sql = "SELECT *FROM  requests_material";
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
                                            <td class="center"><?php echo htmlentities($result->quantity);?> Pcs</td>  
                                            <td class="center"><?php echo htmlentities($result->remark);?> </td>  
                                            <td class="center"><?php echo htmlentities($result->status);?></td> 
                                            </td>
                                       
                                       <td>
                                           <?php
                                               if($result->status=='Released'){
                                                   
                                                   ?>   <a href="update2.php?varietyName=<?php echo $result->varietyName; ?>&task=Returned" class="btn btn-danger btn-xs">Return</a>
                                                   <?php
                                               }
                                           ?>
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
