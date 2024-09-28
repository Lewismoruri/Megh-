<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Allwin</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">

</head>

<body style="background-color:#1A4606">



    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row"><br>
                <div class="col-lg-12">
                    <center><h5 class="page-header">ADD FEEDBACK</h5></center>
                    <a class="btn btn-sm btn-warning" href="../index.php?q=profile">Back</a>
                </div><br>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
       
                                
                                <?php
include 'dbconnect.php';
$SUMMARYID=$_GET['SUMMARYID'];
$qry= "SELECT * FROM tblsummary WHERE SUMMARYID='$SUMMARYID'
"; 
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
    
?>                                    
                                    <form role="form" action="add.php" method="post">
                                     
                                            <label>Status</label>
                                            <div class="form-group">
                               <select name="GOODSSTATUS">
                                
                               <option value=""> Select Status</option>
                                <option value="Accepted"> Accept</option>
                                <option value="Rejected"> Reject</option>
                               </select>
                                        </div><br>
                                            <label>Add Comment</label>
                                        <div class="form-group">
                                            <textarea name="CUSTCOMMENT" class="form-control" rows="5" cols="30"  required></textarea>
                                        </div>

                                        

                                       
                                       
                       <!-- id hidden grna input type ma "hidden" -->
                      
                                     
    <input type="hidden" name="SUMMARYID" value="<?php echo $row['SUMMARYID'];?>">              
                                    
                                
                                        
                
                                    
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
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

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