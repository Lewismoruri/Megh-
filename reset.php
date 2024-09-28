<?php
session_start();
error_reporting(0);
error_reporting(E_ERROR);
include('config.php');
if (isset($_POST['login'])) {
    $EMAIL = $_POST['EMAIL'];

    $statement = $dbh->prepare("SELECT * FROM tblcustomer WHERE EMAIL=?");
    $statement->execute(array($EMAIL));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $EMAIL = $row['EMAIL'];
        $STATUS = $row['STATUS'];
    }
    $_SESSION['CUSID'] = $row;

    if ($EMAIL != $row['EMAIL']) {
        $notify = 'message';
        $show = 'Email Does Not exist,Please Try Again With Correct Email';
    } elseif ($STATUS == 0) {
        $notify = 'message';
        $show = 'Please Wait for Admin Approval';
    } elseif ($STATUS == '2') {
        $notify = 'message';
        $show = 'Your Account is inactive. Please contact admin';
    } else {
        $notify = 'message';
        $show = 'Success proceed!!';
        header("Refresh:1.5; url=indexreset.php?q=profile");
    }
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
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="js/custom-sweeralert.js"></script>
</head>
<body style="background-color:#50DAF6">
    <!------MENU SECTION START-->
    <?php
    if ($notify == 'message') {
        echo '<script>swal("", "'.$show.'");</script>';
    }
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <center><h3 class="header-line"><font color="maroon">CUSTOMER PASSWORD RESET</font></h3></center>
                </div>
            </div>

            <!--LOGIN PANEL START-->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            RESET PASSWORD FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">

                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="text" name="EMAIL" required />
                                </div>
                                <button type="submit" name="login" class="btn btn-success">Submit </button> <br>
                            </form>
                        </div>
                   </div>
                    <button class="btn btn-danger"><a href="index.php"><font color="white"> Back </font></a></button>
                </div>
            </div>
            <!---LOGIN PANEL END-->
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
