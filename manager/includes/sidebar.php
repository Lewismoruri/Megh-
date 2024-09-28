<?php

include("securityAdmin.php")

?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#2B50EA" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" style="background-color:" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" ><font color="white"><h4>Service Manager Panel</h4></font></a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->
<font color="white">
<i class="fa fa-user" ></i>

My Profile</font></b>


</a<!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $USERID; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->



<li class="divider"></li>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->
<li>
            <a href="manage_services.php" style="color:white">Services </a>
        </li>
 <li>
            <a href="managebookings.php" style="color:white">Pending Bookings </a>
        </li>
        <li>
            <a href="approvedbookings.php" style="color:white"> Approved/Completed Task </a>
        </li>
        <li>
            <a href="register/inbox.php" style="color:white"> Messages </a>
        </li>
       
<li><!-- li Starts -->




<a href="logout.php" style="color:white">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php ?>