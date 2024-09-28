<?php

session_start();

include("includes/db.php");

?>
    <!DOCTYPE HTML>
    <html>

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Production Manager Login</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" >

        <link rel="stylesheet" href="css/login.css" >

    </head>

    <body style="background-color:white">
    <div class="container" ><!-- container Starts -->

        <form class="form-group" action="" method="post" ><!-- form-login Starts -->
        <center> <h2 class="form-login-heading" ><font color="black">Technician Login</h2></center>
<div>
    <label>Enter Your Email</label>
            <input type="text" class="form-control" name="EMAIL" placeholder="Email Address" required >
</div>
<div>
<label>Enter Your Password</label>
            <input type="password" class="form-control" name="U_PASS" placeholder="Password" required >
</div><br>
            <button class="btn btn-md btn-primary btn-block" type="submit" name="admin_login" >

                Log in

            </button>


        </form><!-- form-login Ends --><br>
    </div><!-- container Ends -->
    <div class="container"  >
  <a href="../index.php" >  <button class="btn btn-sm btn-danger "><font color="white">Back</font></button></a><br>
</div>



    </body>

    </html>

<?php

if(isset($_POST['admin_login'])){

    $EMAIL = mysqli_real_escape_string($con,$_POST['EMAIL']);

    $U_PASS = mysqli_real_escape_string($con,$_POST['U_PASS']);
    

    $get_admin = "select * from tbluseraccount where EMAIL='$EMAIL' AND U_PASS='$U_PASS' AND U_ROLE='Technician' AND STATUS='1'";

    $run_admin = mysqli_query($con,$get_admin);

    $count = mysqli_num_rows($run_admin);

    if($count==1){

        $_SESSION['EMAIL']=$EMAIL;


        echo "<script>window.open('index.php?dashboard','_self')</script>";

    }
    else {

        echo "<script>alert('Sorry!! Email or Password is Wrong')</script>";

    }

}

?>