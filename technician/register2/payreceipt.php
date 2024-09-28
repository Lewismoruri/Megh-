<?php
include('connection.php');
session_start();

$q1=mysqli_query($conn,'select * from staff where user_id="'.$_SESSION['id'].'"');
$r1=mysqli_fetch_assoc($q1);

error_reporting(0);
include('config.php');

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
            <center><h3>MERU METALS LTD</h3></center>
                    <center><h4>Email: info@merumetals.co.ke<br>
                    Tel : +254 775 657 665
                </h4></center>
                  
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
                                            <th><font color="red">PRODUCT DETAILS </font></th>
                                            <th><font color="red">PAYMENT DETAILS </font></th>
                                        </tr>
                                    </thead>
                                    <tbody

<?php  
$id=$_GET['id']; 
$sql = "SELECT *FROM requestsmat where id='$id' and payStatus='Paid and Received' and Ref!=''  ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <div class="container">
                                                SUPPLIER COPY<br>
                                       <b> Name :</b> <?php echo $r1['firstname']; ?> <?php echo $r1['lastname']; ?><br>
                                        <b>Email :</b > <?php echo $r1['email']; ?><br>
                                        <b>Contact :</b > <?php echo $r1['contact']; ?><br>
</div>
                                            <td class="center"><?php echo htmlentities($cnt);?></td>                                     
                                            <td><b>Product Name :</b><?php echo htmlentities($result->varietyName);?><br>
                                            <b>Quantity (Kgs):</b><?php echo htmlentities($result->quantity);?><br>
                                            <b>Price Per (Kgs) :</b><?php echo htmlentities($result->charges);?></td> 
                                            <td class="center"> 
                                               <b>Total Amount :</b> <?php echo htmlentities($result->charges)*($result->quantity);?><br>
                                                <b>Transaction Code :</b><?php echo htmlentities($result->Ref);?><br>
                                                <b>Date :</b><?php echo htmlentities($result->date_created);?><br>
                                        </td> 
                                           
                                           <!-- <td class="center">
                                           
                                           <?php                              
                               if($row['charges']=='0'){
                               ?>
                                  <a href="setprice.php?id=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-success btn-sm"> Set Price</button>
                               <?php
                               }                   
                       ?>
                              
                              <?php if($result->Ref!=='')
                               if($result->payStatus=='Paid')
 {?>
<a href="unpaidsupplies-supplier.php?inid=<?php echo htmlentities($result->id);?>"  >  <button class="btn btn-warning btn-sm"> Received</button>
<?php } else {?>

                                            <?php } ?>
                        
                       <?php if($result->status==Confirmed)
 {?>
<a href="mytendersapproved.php?id=<?php echo htmlentities($result->id);?>&task=Supplied"  >  <button class="btn btn-success btn-sm"> Supply </button>
<?php } else {?>

                                            <?php } ?>
                                            </td> -->  
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
