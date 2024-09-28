<?php
error_reporting(0);
include('configcontact.php');
include('connection.php');
include('dbcon.php');


if(isset($_POST['send'])) {    
    $varietyName=$_POST['varietyName'];
    $quantity=$_POST['quantity'];
    $specs=$_POST['specs'];
    $price=$_POST['price'];
    $supplier=$_POST['supplier'];
    $DueDate=$_POST['DueDate'];
    $sql="INSERT INTO  requests(varietyName,quantity,specs,price,supplier,DueDate) VALUES(:varietyName,:quantity,:specs,:price,:supplier,:DueDate)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':varietyName',$varietyName,PDO::PARAM_STR);
    $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
    $query->bindParam(':specs',$specs,PDO::PARAM_STR);
    $query->bindParam(':price',$price,PDO::PARAM_STR);
    $query->bindParam(':supplier',$supplier,PDO::PARAM_STR);
    $query->bindParam(':DueDate',$DueDate,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) {
        $msg="Request was sent successfully.";
    }
    else {
        $error="Something went wrong. Please try again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
    <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
   <script>
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxClassArms3.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>

<body style="background-color:white ">


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../index.php"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
            </li>
          
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
              <div class="col-lg-8 mb-4">
                  
                <center><h5><b><font color="black">REQUEST PRODUCT :</font></b></h5></center>
                
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form name="sentaddress"  method="post">
               
                    
                    <input type="hidden" class="form-control" id="sender"  name="varietyName">
                    <div class="form-group row mb-3">
                    <div class="col-xl-6">
                        <label class="form-control-label"  style="color:black">Select Product<span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM tblproduct";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="varietyName" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                          echo'<option value="">--Select Product--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['OWNERNAME'].'" >'.$rows['OWNERNAME'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div></div>
                        <div class="form-group">
                        <label class="form-control-label" style="color:black">Current Selling Price<span class="text-danger ml-2">*</span></label>
                            <?php
                                echo"<div id='txtHint'></div>";
                            ?>
                        </div>
                    </div>
                    </div><!--
                    <div class="control-group form-group">
                        
                        <label style="color:black">Buying Price:</label>
                            <div class="controls">
    <input name="price" class="form-control" type="number" required  >
                            </div>
                        </div>-->
                        <div class="control-group form-group">
                        
                        <label style="color:black">Quantity (Pieces):</label>
                            <div class="controls">
    <input name="quantity" class="form-control" type="number" required  >
                            </div>
                        </div>
             
                    <div class="control-group form-group">
                        
                    <label  style="color:black">Description :</label>
                        <div class="controls">
<textarea rows="5" cols="36" name="specs" required ></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                    <div class="col-xl-6">
                        <label class="form-control-label"  style="color:black">Select Supplier<span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM tbluseraccount where U_ROLE='Supplier' and STATUS='1'";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="supplier" class="form-control ">';
                          echo'<option value="">--Select Supplier--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['EMAIL'].'" >'.$rows['U_NAME'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div></div>
                        <div class="control-group form-group">
                        
                        <label  style="color:black">Required By Date :</label>
                            <div class="controls">
    <input name="DueDate" class="form-control" type="date" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                    <div id="success"></div>
                    <!-- For success/fail addresss -->
                    <button type="submit" name="send"  class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Contact Details Column -->
                 
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the recepient address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>
