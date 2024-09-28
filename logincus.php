<?php
session_start();
error_reporting(0);
error_reporting(E_ERROR);
include('config.php');
if(isset($_POST['login']))
{
 
$CUSUNAME=$_POST['CUSUNAME'];
$CUSPASS=$_POST['CUSPASS'];

$statement = $dbh->prepare("SELECT * FROM tblcustomer WHERE  CUSUNAME=?");
$statement->execute(array($CUSUNAME));
$total = $statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row) {
    $CUSUNAME = $row['CUSUNAME'];
    $STATUS = $row['STATUS'];
    $row_password = $row['CUSPASS'];
}
$_SESSION['CUSID']=$row;
if($CUSUNAME !=($CUSUNAME)) {
  $notify='message';
  $show='Wrong username. Please Enter The Correct Username';
}  
    //using MD5 form
   elseif( $row_password != ($CUSPASS) ) {
      $notify='message';
      $show='wrong password';
    } elseif($STATUS == 0) {
          $notify='message';
          $show='Please Wait for Admin Approval';
        } elseif($STATUS == '2') {
             
                $notify='message';
$show='Your Account is inactive.Please contact admin';
        }else {
         
            $notify='message';
            $show='Success proceed!!';
          header("Refresh:1.5; url =index.php");
        }}
    
 

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> </title>
 
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="js/custom-sweeralert.js"></script>  

</head>
<body style="background-color:#50DAF6">
    <!------MENU SECTION START-->
    <?php
if($notify=='message'){
  echo'<script>swal("","'.$show.'");</script>';
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<center><h3 class="header-line"><font color="maroon">CUSTOMER LOGIN</font></h3></center>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Username</label>
<input class="form-control" type="text" name="CUSUNAME" required />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="CUSPASS" required />
</div>
 <button type="submit" name="login" class="btn btn-block btn-success">LOGIN </button> <br>
</form>
 </div>
<center> <button class="btn btn-warning"><a   href="register.php"><font color="white">Do You Have an Account?? SIGN UP </font></a></button></center><br>
<center><a   href="reset.php"><font color="blue"> Forgot Password ?? </font></a></center><br>
</div>
<button class="btn btn-danger"><a   href="index.php"><font color="white"> Back </font></a></button>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->

      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
