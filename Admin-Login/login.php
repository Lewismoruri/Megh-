<?php
    include("php/dbconnect.php");

    $error = '';
    if(isset($_POST['login']))
    {

    $username =  mysqli_real_escape_string($conn,trim($_POST['username']));
    $password =  mysqli_real_escape_string($conn,$_POST['password']);

    if($username=='' || $password=='')
    {
    $error='All fields are required';
    }

    $sql = "select * from user where username='".$username."' and password = '".md5($password)."'";

    $q = $conn->query($sql);
    if($q->num_rows==1)
    {
    $res = $q->fetch_assoc();
    $_SESSION['rainbow_username']=$res['username'];
    $_SESSION['rainbow_uid']=$res['id'];
    $_SESSION['rainbow_name']=$res['name'];
    echo '<script type="text/javascript">window.location="index.php"; </script>';

    }else
    {
    $error = 'Invalid Username or Password';
    }

    }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN PAGE</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
    @font-face {
  font-family: Poppins;
  src: url("fonts/Poppins-Regular.ttf");
}

html * {
  font-family: "Poppins", sans-serif;
}
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
}
</style>

</head>
<body style="background-color:#2B50EA;">
    <div class="container">
        
         <div class="container ">
               
                <div class="col-md-12 ">
                          
                            <div class="panel-body" style="background-color:#F7E5E4; margin-top:10px; font-size:20px;">
                                <form role="form" action="login.php" method="post">
                                    <hr />
									<?php
									if($error!='')
									{									
									echo '<h5 class="text-danger text-center">'.$error.'</h5>';
									}
									?>
                                   <center><label>Administrator Login Page</label></center><hr>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <center><label>Enter Username</label></center>
                                            <input type="text" class="form-control" placeholder="Username " name="username" required />
                                        </div>
                                        
									<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <center><label>Enter Password</label></center>
                                            <input type="password" class="form-control"  placeholder="Password" name="password" required />
                                        </div>
										
                                   
                                     
                                     <button class="btn btn-success" style="border-radius:0%" type= "submit" name="login">Login</button>
                                   
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
