<?php $page='dashboard';
include("php/dbconnect.php");
include("php/checklogin.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN PANEL</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-head-line">Staff Accounts</h3>
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
				<!--
				  <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="pendingstaff.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h4> <?php include 'counter/pendingstaff.php'?></h4>
                                <h5>Pending Staff</h5>
                            </a>
                        </div>
                    </div>
-->
				
                   
					
                    <div class="col-md-4">
                        <div class="main-box mb-green">
                            <a href="activestaff.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h4> <?php include 'counter/activestaff.php'?></h4>
                                <h5>Registered Staff</h5>
                            </a>
                        </div>
                    </div>
					
					
                    <div class="col-md-4">
                        <div class="main-box mb-secondary">
                            <a href="inactivestaff.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h4> <?php include 'counter/inactivestaff.php'?></h4>
                                <h5>In-Active Staff</h5>
                            </a>
                        </div>
                    </div>
                  


                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="activestaff.php?action=add">
                                <i class="fa fa-plus fa-5x"></i>
                                <h5>Add New Staff</h5>
                            </a>
                        </div>
                    </div>

                  
                </div>
                </div>
                <!-- /. ROW  -->

            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    
   
   <script src="js/jquery-1.10.2.js"></script>	
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    


</body>
</html>
