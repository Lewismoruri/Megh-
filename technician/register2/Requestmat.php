<?php
session_start();
error_reporting(0);
include('configcontact.php');
include('dbconnect.php');
include('dbconn.php');
include('conn.php');
include('connection.php');

$q1=mysqli_query($conn,'select * from staff where user_id="'.$_SESSION['id'].'"');
$r1=mysqli_fetch_assoc($q1);


include('connection.php');
include('configcontact.php');
$id=$_GET['id'];
$q2=mysqli_query($conn,"select * from tbmessages where id='$id'");
$r2=mysqli_fetch_assoc($q2);

error_reporting(0);
include 'session.php';
if(isset($_POST['send'])) {  
    $firstname=$_POST['firstname'];  
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $varietyName=$_POST['varietyName'];
    $quantity=$_POST['quantity'];
    $specs=$_POST['specs'];
    $charges=$_POST['charges'];
    $sql="INSERT INTO  requestsmat(firstname,lastname,email,contact,varietyName,quantity,specs,charges) VALUES(:firstname,:lastname,:email,:contact,:varietyName,:quantity,:specs,:charges)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
    $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':contact',$contact,PDO::PARAM_STR);
    $query->bindParam(':varietyName',$varietyName,PDO::PARAM_STR);
    $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
    $query->bindParam(':specs',$specs,PDO::PARAM_STR);
    $query->bindParam(':charges',$charges,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) {
        $msg="Supplies Submitted successfully.";
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

<body>

    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../supplier_panel.php"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
            </li>
          
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
              <div class="col-lg-8 mb-4">
                  
                <center><h5><b>SUBMIT SCRAP MATERIAL :</b></h5></center>
                
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form name="sentaddress"  method="post">             
                <input type="hidden" class="form-control"  name="firstname" readonly value="<?php echo $r1['firstname']; ?>"> 
                <input type="hidden" class="form-control"  name="lastname" readonly value="<?php echo $r1['lastname']; ?>">  
                <input type="hidden" class="form-control"  name="email" readonly value="<?php echo $r1['email']; ?>"> 
                <input type="hidden" class="form-control"  name="contact" readonly value="<?php echo $r1['contact']; ?>"> 
                  
                        <div class="form-group ">
                    <div class="">
                        <label class="form-control-label"><b>Scrap Type</b><span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM category";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="varietyName" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                          echo'<option value="">--Select Material Type--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['cat_name'].'" >'.$rows['cat_name'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div></div>
                        <div class="">
                        <label class="form-control-label"><b>Price Per Kg</b><span class="text-danger ml-2">*</span></label>
                            <?php
                                echo"<div id='txtHint'></div>";
                            ?>
                        </div>
                    </div>
                    </div>

                        <div class="control-group form-group">
                        
                        <label><b>Scrap Material Quantity (Kgs):</b></label>
                            <div class="controls">
    <input name="quantity" type="number" class="form-control" required  >
                            </div>
                        </div>
             
                    <div class="control-group form-group">
                        
                    <label><b>Material Description :</b></label>
                        <div class="controls">
<textarea rows="5" cols="36" name="specs" class="form-control" required ></textarea>
                        </div>
                    </div>
                   
                    <div id="success"></div>
                    <!-- For success/fail addresss -->
                    <button type="submit" name="send"  class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Contact Details Column -->
                    <?php 
$pagetype=$_GET['type'];
$sql = "SELECT Address,recepientId,ContactNo from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
            <div class="col-lg-4 mb-4">
                <h3>Contact Details</h3>
                <p>
                   <?php   echo htmlentities($result->Address); ?>
                    <br>
                </p>
                <p>
                    <abbr title="message">P</abbr>: <?php   echo htmlentities($result->ContactNo); ?>
                </p>
                <p>
                    <abbr title="recepient">E</abbr>: <a href="mailto:name@example.com"><?php   echo htmlentities($result->recepientId); ?>
                    </a>
                </p>
              <?php }} ?>
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
<?php include('includes/footer.php');?>

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
