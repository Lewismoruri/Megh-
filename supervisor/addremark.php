<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> </title>

    <!-- Bootstrap Core CSS -->
    <link href="inc/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="inc/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="inc/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">

</head>

<body>



    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br><br>
                    <h3 class="page-header">Supervisor Remark</h3>
                    <a class="btn btn-info" href="approvedbookings.php">Back</a>
                </div><br>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                
                                <?php
include 'dbconnect.php';
$id=$_GET['id'];
$qry= "SELECT * FROM tbl_bookings where id='$id'
"; 
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
    
?>                                    
                                    <form role="form" action="addr.php" method="post">
                                     
<input class="form-control" readonly name="photographer_status" type="hidden" value='On Process' required>
<input class="form-control" readonly name="id" type="hidden" value='<?php echo $row['id']; ?>' required>
                                       
                                        

<div class="form-group">
<div class="font-italic">Type your remark here<span style="color:red">*</span></div>
<textarea class="form-control"  class="form-control" rows="5" name="sup_remark" type="text"   required></textarea>
</div>

                                       
                       <!-- id hidden grna input type ma "hidden" -->
                      
                                     
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">              
                                    
                                
                                        
                
                                    
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
    <?php
}
?>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="inc/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="inc/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="inc/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

	
	<style>
	footer{
   background-color: #424558;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
	</style>

</html>