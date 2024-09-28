<?php  
 
       if (!isset($_SESSION['CUSID'])){
      redirect("index.php");
     }


     // if($_SESSION['fixnmixConfiremd']>0){
     //   $query = "update `tblpayment` SET `HVIEW` = true WHERE `CUSTOMERID`='".$_SESSION['CUSID']."' AND STATS in ('Confirmed','Cancelled')  AND HVIEW=0";
     //    mysql_query($query);
     // }
    

     $customer = New Customer();
      $res = $customer->single_customer($_SESSION['CUSID']['CUSTOMERID']);
    ?>
<section>
    <div class="container">
         <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Profile</li>
        </ol>
      </div>
        <div class="row">
    <div class="col-sm-3">
        <div class="panel">
            <ul class="list-group">
            <!-- <li class="list-group-item text-muted">Profile</li> -->
                <li class="list-group-item text-right"><span class=
                "pull-left">     <font color="black"><strong>Customer Name</strong></span>&nbsp;
                   <?php echo $res->FNAME .' '.$res->LNAME; ?></li>
                <li class="list-group-item text-right"> 
                <div class="panel-group" id="accordion">   
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"  >Change Password</a>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="<?php echo web_root; ?>customer/controller.php?action=changepassword" method="POST"> 
                          <input type="password" class="form-control" name="CUSPASS" required placeholder="Password"><br/>
                          <input class="btn btn-sm btn-success" type="submit" name="save"  value="Change">
                        </form>
                      </div>
                  </div>
                </div> 
                </li>
            </ul>
        </div>
    </div>
  </div>
  </div>
</section>