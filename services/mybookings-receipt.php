<?php require_once('head.php'); ?>



<section class="content-header">
	<div class="content-header-left">
		<center><h4><font color="green">MY BOOKING RECEIPT</font></h4></center>
	</div>
</section>


<section class="content">

  <div class="card">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive table-bordered">
          <table id="example1" class="table table-hover table-striped">
			<thead>
			    <tr>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
                $id=$_GET['id'];
            	$statement = $pdo->prepare("SELECT * FROM tbl_bookings where id='$id' and stu_id='".$_SESSION['CUSID']['CUSTOMERID']."'");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
                     <div class="card"><br>
                                        <b>CUSTOMER DETAILS.</b><br>
                                    <b>Name:</b><?php echo $row['full_name']; ?> <?php echo $row['l_name']; ?><br>
                                    <b>Email:</b><?php echo $row['email']; ?><br>
                                    <b>Contact:</b><?php echo $row['phone']; ?><br>
                                            </div><hr>
                      
	                    
	                   
                       <div class="container">
                           <b>SERVICE: </b><?php echo $row['service']; ?>
                     <br>
                     <b>NUMBER OF ITEMS: </b><?php echo $row['qty']; ?>
                     <br>
                        <b>CHARGES PER ITEM :</b> Ksh  <?php echo $row['charges']; ?><br>
                        <b>COMMUTATION FEE :</b> Ksh <?php echo $row['fee']; ?><br>
                        <b>SERVICE DATE :</b><?php echo $row['eventdate']; ?> <br>
                        <hr><div class="pull-right">
                       <b>AMOUNT PAID :</b> Ksh  <?php echo ($row['charges']*$row['qty'])+$row['fee']; ?><br>
                       <b>TRANSACTION CODE :</b> <?php echo $row['transactioncode']; ?><br>
                       <b>PAYMENT METHOD :</b> <?php echo $row['method']; ?><br>
                       <b>PAID ON :</b> <?php echo $row['bdate']; ?><br>
                           </div><br>
                           <b> Booking Date :</b><?php echo $row['pdate']; ?>
                      
                        <br>
                     
                       
	                </tr>
            		<?php
            	
            }
            	?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>




<?php require_once('footer.php'); ?>