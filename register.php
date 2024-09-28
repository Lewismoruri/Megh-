<?php 

error_reporting(E_ERROR);
include('config.php');
include('conf.php');
include('dbconn.php');
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_POST['signup'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $CUSPASS=$_POST['CUSPASS'];
  $confirmCUSPASS=$_POST['confirmCUSPASS'];
  //$PHONE=$_POST['PHONE'];
  $GENDER=$_POST['GENDER'];
  //$Ref=$_POST['Ref'];
  //$activities=$_POST['activities'];
  $CITYADD=$_POST['CITYADD'];
  $STATUS=0;
  $FNAME = test_input($_POST["FNAME"]);
  $EMAIL = test_input($_POST["EMAIL"]);
  $LNAME = test_input($_POST["LNAME"]);
  $CUSUNAME = test_input($_POST["CUSUNAME"]);
  $PHONE = test_input($_POST["PHONE"]);
 

  $PHONEx = "/^[0-9]{10,}$/";
  $naming = "/^[a-zA-Z]{2,}$/";
  $buss="/^[a-zA-Z0-9 ]{6,20}$/";
  $buss2="/^[a-zA-Z0-9 ]{6,10}$/";
  $ship="/^[a-zA-Z0-9 ]{4,50}$/";
  //$mail="/^[a-z0-9._%+-]+@gmail+\.[a-z]{2,4}$/";
  //$mail2="/^[a-z0-9._%+-]+@yahoo+\.[a-z]{2,4}$/";
  $mail="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
  $phoning="/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im";
  

  if($CUSPASS!=$confirmCUSPASS){
    $notify='message';
    $show='Your passwords do not match';
  }else
  
  if(!preg_match($naming,$FNAME)){
    $notify='message';
    $show='Enter a valid first Name e.g yvan';
    
  }else
  if
  (!preg_match($mail,$EMAIL)) {
   $notify='error';
   $show='Enter a valid EMAIL';
 }else
  if(!preg_match($naming,$LNAME)){
    $notify='message';
    $show='Enter a valid Last Name e.g mzee';
  }else
  if(!preg_match($naming,$CUSUNAME)){
    $notify='message';
    $show='Enter valid username e.g IVAN';
  }else
  if(!preg_match($PHONEx,$PHONE)){
    $notify='message';
    $show='Enter valid PHONE Number that is 10 digits';
  }else{
      $select=mysqli_query($con,"select CUSUNAME from tblcustomer where CUSUNAME='$CUSUNAME'");
      if(mysqli_num_rows($select)>0){
        $notify='message';
        $show='CUSUNAME already exist';
        mysqli_close($con);
      }else{
        $select=mysqli_query($con,"select EMAIL from tblcustomer where EMAIL='$EMAIL'");
      if(mysqli_num_rows($select)>0){
        $notify='message';
        $show='EMAIL already exist';
        mysqli_close($con);
      }else{
        $select=mysqli_query($con,"select PHONE from tblcustomer where PHONE='$PHONE'");
        if(mysqli_num_rows($select)>0){
          $notify='message';
          $show='PHONE number already exist';
          mysqli_close($con);
        }else{
					
          $ret=mysqli_query($con,"insert into tblcustomer(FNAME,LNAME,CUSUNAME,EMAIL,CUSPASS,PHONE,GENDER,CITYADD,STATUS) 
          values('$FNAME','$LNAME','$CUSUNAME','$EMAIL','$CUSPASS','$PHONE','$GENDER','$CITYADD','$STATUS')");
          if($ret)
{
  $notify='message';
  $show='Registration successful.  Wait for approval';
  header("Refresh:4; url=index.php");
}else
{
  $notify='message';
  $show='Failed to register';
}
        }
      }
      }
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from tblcustomer where tblcustomerID = '".$_GET['tblcustomerID']."'");
                  $_SESSION['delmsg']="tblcustomer deleted !!";
                }
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
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <title>Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="assets/js/custom-sweeralert.js"></script>  
<script>
  function myFunction() {
    var x = document.getElementById("CUSPASS");
    if (x.type === "CUSPASS") {
      x.type = "text";
    } else {
      x.type = "CUSPASS";
    }
  }
  </script>
</head>
<body >
<?php
if($notify=='message'){
  echo'<script>swal("","'.$show.'");</script>';
}
?>
    <!------MENU SECTION START-->
<?php include('includes/head.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h3 style = "text-align:center" class="page-head-line"><font color="black">Sign Up</font></h3>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 style = "color:green; text-align:center" class="page-head-line">  </h4>
                        </div>



                        <div class="panel-body">
                        <form name="signup" method="post" onSubmit="return valid();"  enctype="multipart/form-data">
                            <div class="form-group">
  
                            <a href="index.php" class="btn btn-sm btn-danger pull-right"> <span class='glyphicon glyphicon-backward'></span> back</a>
<br>
                            <div class="form-group">
    <label for="FNAME">FIRST NAME  </label>
    <input type="text" class="form-control" id="FNAME" name="FNAME" placeholder="first Name" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required
 style="font=size:16px" maxlength="20" value="<?php echo isset($_POST['FNAME']) ? htmlspecialchars($_POST['FNAME']) : ''; ?>"/>
  </div>

<div class="form-group">
    <label for="LNAME">LAST NAME </label>
    <input type="text" class="form-control" id="LNAME" name="LNAME" placeholder="last name" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required
 style="font=size:16px" maxlength="20" value="<?php echo isset($_POST['LNAME']) ? htmlspecialchars($_POST['LNAME']) : ''; ?>"/>
  </div> 

  
<div class="form-group">
    <label>EMAIL </label>
    <input type="email"  class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL"
oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required style="font=size:16px" maxlength="30" 
value="<?php echo isset($_POST['EMAIL']) ? htmlspecialchars($_POST['EMAIL']) : ''; ?>"/>
  </div> 
  
 
  <div <?php if (isset($PHONE_error)): ?> class="form_error" <?php endif ?> class="form-group">
    <label for="PHONE">PHONE </label>
    <input type="number" class="form-control" id="PHONE" name="PHONE"value="<?php echo $PHONE; ?>" onblur="checkAvailability()" onkeyup= "restrict('PHONE')"placeholder="phone number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required
 style="font=size:16px" maxlength="10" value="<?php echo isset($_POST['PHONE']) ? htmlspecialchars($_POST['PHONE']) : ''; ?>"/>
    <?php if (isset($PHONE_error)): ?>
      	<span><?php echo $PHONE_error; ?></span>
      <?php endif ?>
  </div>
  <div class="form-group">
							<label class="control-label text-primary"  for="GENDER">GENDER</label>
							<select id="GENDER" name="GENDER" required class="form-control input-sm">
    <option value="">Select gender</option>
    <option value="Male" <?php echo isset($_POST['GENDER']) && $_POST['GENDER'] === 'Male' ? 'selected' : ''; ?>>Male</option>
    <option value="Female" <?php echo isset($_POST['GENDER']) && $_POST['GENDER'] === 'Female' ? 'selected' : ''; ?>>Female</option>
</select>
						</div>
            
            <div class="form-group">
							<label class="control-label text-primary"  for="GENDER">CITY</label>
							<select id="CITYADD" name="CITYADD" required class="form-control input-sm">
    <option value="" >Select city</option>
    <?php
    $query = mysqli_query($dbconn, "SELECT * FROM tbl_country ORDER BY country_id");
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <option value="<?php echo htmlspecialchars($row['country_name']); ?>" <?php echo isset($_POST['CITYADD']) && $_POST['CITYADD'] === $row['country_name'] ? 'selected' : ''; ?>><?php echo $row['country_name']; ?></option>
    <?php
    }
    ?>
</select>

  </div>
  
<div <?php if (isset($name_error)):
   ?> class="form_error" <?php endif ?> class="form-group">
    <label for="CUSUNAME">USERNAME  </label>
    <input type="text" class="form-control" id="CUSUNAME" name="CUSUNAME" value="<?php echo $CUSUNAME; ?>" placeholder="username"
     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required
 style="font=size:16px" maxlength="20" value="<?php echo isset($_POST['CUSUNAME']) ? htmlspecialchars($_POST['CUSUNAME']) : ''; ?>"/>
    <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
  </div>
  <div class="form-group">
<label> PASSWORD</label>
<input class="form-control" type="password" id="CUSPASS" name="CUSPASS"
oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
required style="font=size:16px" maxLength="9" minLength="4" value="<?php echo isset($_POST['CUSPASS']) ? htmlspecialchars($_POST['CUSPASS']) : ''; ?>"/><input type="checkbox" onclick="myFunction()"> Show CUSPASS
</div>

<div class="form-group">
<label>CONFIRM PASSWORD </label>
<input class="form-control"  type="password" id="confirmCUSPASS" name="confirmCUSPASS"
oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
 required style="font=size:16px" maxLength="9" minLength="5" value="<?php echo isset($_POST['confirmCUSPASS']) ? htmlspecialchars($_POST['confirmCUSPASS']) : ''; ?>"/>
</div>  

<button type="submit" name="signup" class="btn btn-success" id="submit">Submit </button>
</form>
</div>
                            </div>
                            </div>
                            </div>
                    </div>
                  
                </div>
                </div>
                            </div>
                    </div>
                  
                </div>
       
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                  
                     <!--  End  Bordered Table  -->
                </div>
            </div>





        </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
