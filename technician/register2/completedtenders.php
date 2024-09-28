<?php
session_start();
error_reporting(0);
include('config.php');
// code for block student    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update requestsmat set status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:mytenders.php');
}



//code for active students
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=Supplied;
$sql = "update requestsmat set status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:mytendersapproved.php');
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
                <h4 > <font color="black">SUPPLIED SCRAP MATERIALS :</font></h4>
                  
    </div>
   
        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                <div class="container"><br>
                <button class="btn btn-sm btn-primary"><a href="../supplier_panel.php"><font color="white">Back</font></a></button>
</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><font color="green">Material Type</font></th>
                                            <th><font color="green">Quantity</font></th>
                                            <th><font color="green">Description</font></th>
                                            <th><font color="green">Price Per Kg</font></th>
                                            <th><font color="green">Supplied On By</font></th>
                                            <th><font color="green">Status</font></th>
                                           <!-- <th><font color="green">Payment Status</font></th>
                                            <th><font color="green">Transaction Code</font></th>
                                            <th><font color="green">Action</font></th>-->
                                        </tr>
                                    </thead>
                                    <tbody

<?php                                      $sql = "SELECT *FROM requestsmat where status='Received' or status='Supplied' or status='Received and Updated' ";
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
                                            <td class="center"><?php echo htmlentities($result->quantity);?> Kgs</td>    
                                            <td class="center"><?php echo htmlentities($result->specs);?></td> 
                                            <td class="center">Ksh <?php echo htmlentities($result->charges);?></td> 
                                            <td class="center"><?php echo htmlentities($result->date_created);?></td>  
                                            <td class="center">        <?php                              
                               if($result->status=='Received and Updated'){
                               ?>
                                 Supplied
                               <?php
                               }                   
                       ?></td>   
                                           <!-- <td class="center"><?php echo htmlentities($result->payStatus);?></td> 
                                            <td class="center"><?php echo htmlentities($result->Ref);?></td> 
                                            <td class="center">
                                           
                                           <?php                              
                               if($row['charges']=='0'){
                               ?>
                                  <a href="setprice.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-success btn-sm"> Set Price</button>
                               <?php
                               }                   
                       ?>
                              
                              <?php if($result->charges==0)
 {?>
<a href="setprice.php?id=<?php echo htmlentities($result->id);?>&task=Supplied"  >  <button class="btn btn-warning btn-sm"> Enter Price</button>
<?php } else {?>

                                            <?php } ?>
                        
                       <?php if($result->status==Supplied)
 {?>
<a href="mytendersapproved.php?id=<?php echo htmlentities($result->id);?>&task=Supplied"  >  <button class="btn btn-success btn-sm"> Supply </button>
<?php } else {?>

                                            <?php } ?>
                                            </td>  --> 
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
