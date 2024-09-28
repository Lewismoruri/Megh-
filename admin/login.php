<?php
require_once("../include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: ">
	<div class="" >
		<div class="container" >
		<br>
			<div class="wrap-login10" >
				<form method="post" action=""  class="-form validate-form" >
					<h4><font color="black"><b>Inventory Manager Login</b></h4></center>
					<hr>
				 	<?php echo check_message(); ?>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<center><label><b>Enter Your Username</b></label></center>
					<input class="input100" type="text" name="user_email" placeholder="Username" style="border: 1px solid black;">

					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
					<center><label><b>Enter Your Password</b></label></center>
						<input class="input100" type="password" name="user_pass" placeholder="Password" style="border: 1px solid black;">
					</div>

					<div class=""><br>
						<button class="btn btn-primary btn-block" type="submit" name="btnLogin"  >
							Login
						</button>
					</div>
 
				</form><hr>
				<div class="">
				<button class="btn btn-danger btn-sm btn-round "><a href="../index.php" style="color:white">Back</a></button>
				</div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = $upass;
  $U_ROLE = 'Inventory';
  
   if ($email == '' OR $upass == '' OR $U_ROLE == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::userAuthentication($email, $h_upass,$U_ROLE);
    if ($res==true) { 
       message("You logon as ".$_SESSION['U_ROLE'].".","success");
      if ($_SESSION['U_ROLE']=='Inventory'){
         redirect(web_root."admin/index.php");
      }else{
           redirect(web_root."admin/login.php");
      }
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(web_root."admin/login.php"); 
    }
 }
 } 
 ?> 



 