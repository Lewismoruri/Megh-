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

<body>



    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="page-header">MAKE PAYMENT</h5>
                    <a class="btn btn-sm btn-warning" href="unpaidtenders.php">Back</a>
                </div><br>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                
                                <?php
include 'dbconnect.php';
$id=$_GET['id'];
$qry= "SELECT * FROM requests WHERE id='$id'
"; 
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
    
?>                                    
                                    <form role="form" action="paynow.php" method="post">
                                     
                                            <input class="form-control" type="hidden" readonly name="payStatus" value='Paid' required>
                                            TOTAL AMOUNT<br>
                                            <input class="form-control" type="text" readonly name="total" value='<?php echo $row['quantity']*$row['charges'];?>' required>
                                       <br> <br>
                                       
                                       <div class="form-group">
                                            <label>Payment Method</label>
                                       <select name="paymethod" id="paymentmethod" onchange="updateTransactionCodeInput()">
    <option value="">Select Bank</option>
    <option value="Equity Bank">Equity Bank</option>
    <option value="Kenya Commercial Bank">Kenya Commercial Bank</option>
    <option value="Family Bank">Family Bank</option>
    <option value="Cooperative Bank">Cooperative Bank</option>
</select>
</div><br><br>
                                       <div class="form-group">
                                            <label>Transaction Id <br><i>(Example;<br>232345678906)</i></label><br>
                                            <input name="Ref" type="text" id="Ref"  class="form-control"   required>
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
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
    function updateTransactionCodeInput() {
        var paymethod = document.getElementById("paymentmethod").value;
        var transactionCodeInput = document.getElementById("Ref");

        // Reset the transaction code input
        transactionCodeInput.value = "";
        transactionCodeInput.pattern = ""; // Reset the pattern

        // If payment method is not M-Pesa, set pattern and length restrictions
        if (paymethod !== "M-Pesa") {
            transactionCodeInput.pattern = "^[0-9]{12}$"; // Only one uppercase letter
            transactionCodeInput.minLength = 12;
            transactionCodeInput.maxLength = 12;
        }
        // else {
            // pattern="^(?=.*[A-Z])(?=.*[0-9])[A-Z0-9]{10}$" 
            // Reset the pattern and length for M-Pesa
        //   transactionCodeInput.pattern = "^(?=.*[A-Z])(?=.*[0-9])[A-Z0-9]{10}$" ; // Only one uppercase letter
         //   transactionCodeInput.minLength = 10;
       //     transactionCodeInput.maxLength = 10;
      //  }
    }
</script>
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