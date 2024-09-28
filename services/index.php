<?php require_once('header.php'); ?>

<section class="content-header" >
	<h4>Main Dashboard</h4>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_top_category");
$statement->execute();
$total_top_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
$statement->execute();
$total_mid_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_end_category");
$statement->execute();
$total_end_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_services where status='Active'");
$statement->execute();
$pendingpayment = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_status='1'");
$statement->execute();
$total_customers = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_subscriber WHERE subs_active='1'");
$statement->execute();
$total_subscriber = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost");
$statement->execute();
$available_shipping = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Completed'));
$total_order_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment");
$statement->execute();
$paymentrecord = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Completed'));
$completedpayment = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_customer_message");
$statement->execute();
$messages = $statement->rowCount();
?>

<section class="content">
<div class="card">
            <div class="col-lg-12 col-xs-12">
              <!-- small box -->
              <div class="card" style="background-color:default">
                <div class="inner">
                  <h3><?php echo $pendingpayment; ?></h3>

                  <p>Avalable Services</p>
                </div>
                
                <div >
                  <h2><i class="fa fa-camera"></i><h2>
                </div>
                
              </div>
            </div><center>
            <img src="../../images/a1.jpeg" style="width:93%;height:1%"></center>
            <!-- ./col -->
           

		  </div>
		  
</section>

<?php require_once('footer.php'); ?>