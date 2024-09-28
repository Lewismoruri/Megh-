<?php require_once('header.php'); ?>


<?php
$error_message = '';
if(isset($_POST['form1'])) {
    $valid = 1;
    if(empty($_POST['subject_text'])) {
        $valid = 0;
        $error_message .= 'Subject can not be empty\n';
    }
    if(empty($_POST['message_text'])) {
        $valid = 0;
        $error_message .= 'Subject can not be empty\n';
    }
    if($valid == 1) {

        $subject_text = strip_tags($_POST['subject_text']);
        $message_text = strip_tags($_POST['message_text']);

        // Getting Customer Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
        $statement->execute(array($_POST['cust_id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $cust_email = $row['cust_email'];
        }

        // Getting Admin Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $admin_email = $row['contact_email'];
        }

        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tblsummary WHERE payment_id=?");
        $statement->execute(array($_POST['payment_id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
        	
        	if($row['payment_method'] == 'PayPal'):
        		$payment_details = '
Transaction Id: '.$row['txnid'].'<br>
        		';
        	elseif($row['payment_method'] == 'Stripe'):
				$payment_details = '
Transaction Id: '.$row['txnid'].'<br>
Card number: '.$row['card_number'].'<br>
Card CVV: '.$row['card_cvv'].'<br>
Card Month: '.$row['card_month'].'<br>
Card Year: '.$row['card_year'].'<br>
        		';
        	elseif($row['payment_method'] == 'Bank Deposit'):
				$payment_details = '
Transaction Details: <br>'.$row['bank_transaction_info'];
        	endif;

            $order_detail .= '
Customer Name: '.$row['customer_name'].'<br>
Customer Email: '.$row['customer_email'].'<br>
Payment Method: '.$row['payment_method'].'<br>
Payment Date: '.$row['payment_date'].'<br>
Payment Details: <br>'.$payment_details.'<br>
Paid Amount: '.$row['paid_amount'].'<br>
Payment Status: '.$row['payment_status'].'<br>
Shipping Status: '.$row['shipping_status'].'<br>
Payment Id: '.$row['payment_id'].'<br>
            ';
        }

        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['payment_id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $i++;
            $order_detail .= '
<br><b><u>Product Item '.$i.'</u></b><br>
Product Name: '.$row['product_name'].'<br>
Size: '.$row['size'].'<br>
Color: '.$row['color'].'<br>
Quantity: '.$row['quantity'].'<br>
Unit Price: '.$row['unit_price'].'<br>
            ';
        }

        $statement = $pdo->prepare("INSERT INTO tbl_customer_message (subject,message,order_detail,cust_id) VALUES (?,?,?,?)");
        $statement->execute(array($subject_text,$message_text,$order_detail,$_POST['cust_id']));

        // sending email
        $to_customer = $cust_email;
        $message = '
<html><body>
<h3>Message: </h3>
'.$message_text.'
<h3>Order Details: </h3>
'.$order_detail.'
</body></html>
';
        $headers = 'From: ' . $admin_email . "\r\n" .
                   'Reply-To: ' . $admin_email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_customer, $subject_text, $message, $headers);
        
        $success_message = 'Your email to customer is sent successfully.';

    }
}
?>
<?php
if($error_message != '') {
    echo "<script>alert('".$error_message."')</script>";
}
if($success_message != '') {
    echo "<script>alert('".$success_message."')</script>";
}
?>

<section class="content-header">
	<div class="content-header-left">
		<center><h4>COMPLETED ALLOCATIONS</h4></center>
	</div>
</section>
<div class="container">
<button><a href="index.php?dashboard"><font color="black">Back</font></a></button>
</div>
<br>
<section class="content">

  <div class="">
    <div class="col-md-12">


      <div class="box box-dark">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th>#</th>
                    <th>Customer</th>
                    <th>Product Details</th>
			        <th>Order Number</th>
                    <th>
                    	Driver
                    </th>
                    <th>Location</th>
                    <th>Shipping Status</th>
                    <th>Customer Comment</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * FROM `tblsummary` s ,`tblorder` c,`tblproduct` t ,`tblcategory` k
				WHERE   s.`ORDEREDNUM`=c.`ORDEREDNUM` and c.`PROID`=t.`PROID` and t.`CATEGID`=k.`CATEGID`  and ORDEREDSTATS='Confirmed' and SHIPPING_STATUS='Goods Delivered' ORDER by SUMMARYID DESC" );
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr>
	                    <td><?php echo $i; ?></td>
	                    <td>
                        <?php
                           $statement1 = $pdo->prepare("SELECT * FROM tblcustomer WHERE CUSTOMERID=?");
                           $statement1->execute(array($row['CUSTOMERID']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($result1 as $row1) {
                                echo ''.$row1['FNAME']; echo '&nbsp;&nbsp;'.$row1['LNAME'];
                           }
                           ?>
                           
                        </td>  
                        <td>
                       <b >Name :</b> <?php echo $row['OWNERNAME']; ?><br>     
                       <b >Category :</b> <?php echo $row['CATEGORIES']; ?><br>   
                       <b >Quantity :</b> <?php echo $row['ORDEREDQTY']; ?><br>  
                       <b >Price Per Quantity :</b> Ksh<?php echo $row['PROPRICE']; ?><br> <br>    
                       <font color="maroon"> <b >Total Price :Ksh </b> <?php echo $row['PROPRICE']*$row['ORDEREDQTY']; ?><br>    </font>
                        </td>                    
                        <td><?php echo $row['ORDEREDNUM']; ?></td>
                        <td>
                            <?php echo $row['DRIVER']; ?>                        
                        </td>
                        <td>
                            <?php echo $row['LOCATIONDETAILS']; ?>                        
                        </td>
                        <td>
                            <?php echo $row['SHIPPING_STATUS']; ?>                       
                        </td>
                        <td>
                        <?php echo $row['CUSTCOMMENT']; ?>          
                        </td>
	                   
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
