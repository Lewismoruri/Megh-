<?php
session_start();
include('connection.php');
include('configcontact.php');
if(strlen($_SESSION['cust_email'])) {   
    header('location:index.php');
}

else if(isset($_POST['send'])) {    
    $stu_id=$_POST['stu_id'];
    $full_name=$_POST['full_name'];
    $l_name=$_POST['l_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $service=$_POST['service'];
    $charges=$_POST['charges'];
    $eventdate=$_POST['eventdate'];
    $county=$_POST['county'];
    $fee=$_POST['fee'];
    $qty=$_POST['qty'];
    $location=$_POST['location'];
    $duration=$_POST['duration'];
    $sql="INSERT INTO  tbl_bookings(stu_id,full_name,l_name,email,phone,service,charges,eventdate,county,fee,qty,location,duration) VALUES(:stu_id,:full_name,:l_name,:email,:phone,:service,:charges,:eventdate,:county,:fee,:qty,:location,:duration)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':stu_id',$stu_id,PDO::PARAM_STR);
    $query->bindParam(':full_name',$full_name,PDO::PARAM_STR);
    $query->bindParam(':l_name',$l_name,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
     $query->bindParam(':phone',$phone,PDO::PARAM_STR);
     $query->bindParam(':service',$service,PDO::PARAM_STR);
     $query->bindParam(':charges',$charges,PDO::PARAM_STR);
     $query->bindParam(':eventdate',$eventdate,PDO::PARAM_STR);
     $query->bindParam(':county',$county,PDO::PARAM_STR);
     $query->bindParam(':fee',$fee,PDO::PARAM_STR);
     $query->bindParam(':qty',$qty,PDO::PARAM_STR);
     $query->bindParam(':location',$location,PDO::PARAM_STR);
     $query->bindParam(':duration',$duration,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) {
        $msg="Booking Successfully Made,Thank You.";
        header("Refresh:1.5; url =mybookings.php");
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
                <a href="services.php"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
            </li>
          
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
              <div class="col-lg-8 mb-4">
                  
                <center><h5><b>BOOK SERVICE :</b></h5></center>
                
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form name="sentaddress"  method="post">
                 <input type="hidden" class="form-control"  name="full_name" readonly value="<?php echo $r1['FNAME']; ?>">  
                 <input type="hidden" class="form-control"  name="l_name" readonly value="<?php echo $r1['LNAME']; ?>"> 
                 <input type="hidden" class="form-control" name="stu_id" readonly value="<?php echo $r1['CUSTOMERID']; ?>">
                 <input type="hidden" class="form-control"name="email" readonly value="<?php echo $r1['EMAIL']; ?>">
                 <input type="hidden" class="form-control"name="phone" readonly value="<?php echo $r1['PHONE']; ?>">
                 <div class="control-group form-group">                
                    <label>Service Name :</label>
                        <div class="controls">
                        <input type="text" class="form-control" name="service" readonly value="<?php echo $m1['servicename']; ?>">  
                        </div>
                    </div>  
                            
                    <div class="control-group form-group">                
                    <label>Service Charges Per Item  :</label>
                        <div class="controls">
                        <input type="number" class="form-control" name="charges" readonly value="<?php echo $m1['pricing']; ?>">  
                        </div>
                    </div>
                    <div class="control-group form-group">                
                    <label>Number of Items  :</label>
                        <div class="controls">
                        <input type="number" class="form-control" name="qty"required>  
                        </div>
                    </div>
                    <div class="control-group form-group">                
                    <label>Give More Details on Requested Service  :</label>
                        <div class="controls">
                        <textarea name="duration" rows="5" cols="25" class="form-control" required> </textarea>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="form-control-label">County<span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM tbl_country";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="county" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                          echo'<option value="">--Select County--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['country_name'].'" >'.$rows['country_name'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                        <div class="control-group">
                        <label class="form-control-label">Commutation Fee Per County<span class="text-danger ml-2">*</span></label>
                            <?php
                                echo"<div id='txtHint'></div>";
                            ?>
                        </div>
                    </div>
                    </div>
                    <div class="control-group form-group">                
                    <label>Preferred Date :</label>
                        <div class="controls">
                        <input name="eventdate" type="date" min="<?php echo date('Y-m-d'); ?>" required> 
                        </div>
                    </div>
                    <div class="control-group form-group">                
                    <label>Location details :</label>
                        <div class="controls">
                        <textarea name="location" rows="5" cols="25" class="form-control" required> </textarea>
                        </div>
                    </div> 
                     
                    <div id="success"></div>
                    <!-- For success/fail addresss -->
                    <button type="submit" name="send"  class="btn btn-success">Submit</button>
                </form>
            </div>

            <!-- Contact Details Column -->
                    <?php 
$pagetype=$_GET['type'];
$sql = "SELECT Address,lnameId,ContactNo from tblcontactusinfo";
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
                    <abbr title="location">P</abbr>: <?php   echo htmlentities($result->ContactNo); ?>
                </p>
                <p>
                    <abbr title="lname">E</abbr>: <a href="mailto:name@example.com"><?php   echo htmlentities($result->lnameId); ?>
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
    <!-- Do not edit these files! In order to set the lname address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>
