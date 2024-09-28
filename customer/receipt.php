	
<?php
require_once ("../include/initialize.php");
  if (!isset($_SESSION['CUSID'])){
      redirect("index.php");
     }
	 // Check if the ORDEREDNUM parameter is set
if (isset($_GET['ORDEREDNUM'])) {
    // Sanitize and escape the input
    $orderedNum = intval($_GET['ORDEREDNUM']);
    
    // Construct the SQL query with a single WHERE clause
    $query = "SELECT * FROM `tblsummary` s, `tblcustomer` c 
              WHERE s.`CUSTOMERID` = c.`CUSTOMERID` AND s.`ORDEREDNUM` = $orderedNum";
    
    // Execute the query
    $mydb->setQuery($query);
    $cur = $mydb->loadSingleResult();
} else {
    // Handle the case where ORDEREDNUM is not set
    echo "ORDEREDNUM parameter is not set";
}


// $query = "SELECT * FROM tblusers
// 				WHERE   `USERID`='".$_SESSION['cus_id']."'";
// 		$mydb->setQuery($query);
// 		$row = $mydb->loadSingleResult();
?>
 

<div class="modal-dialog" style="width:100%">
  <div class="modal-content">
	<div class="modal-header">
		 <span id="printout">
 
		<!-- <h2 class="modal-title" id="myModalLabel">Billing Details </h2> -->
		
		 
 	 <div class="modal-body"> 
<?php 
if (isset($_GET['ORDEREDNUM'])) {
    // Sanitize and escape the input
    $orderedNum = intval($_GET['ORDEREDNUM']);
    
	 $query = "SELECT * FROM `tblsummary` s ,`tblcustomer` c 
				WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` and s.`ORDEREDNUM` = $orderedNum";
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();

		if($cur->ORDEREDSTATS=='Confirmed'){

		
		if ($cur->PAYMENTMETHOD=="Cash on Pickup") {
			 
		
?>
 	 <h4>Your order has been confirmed and ready for Pick Up</h4><br/>
		<h5>DEAR Ma'am/Sir ,</h5>
		<h5>As you have ordered cash on pick up, please have the exact amount of cash to pay to our staff and bring this billing details.</h5>
		 <hr/>
		 <h4><strong>Pick up Information</strong></h4>
		 <div class="row">
		 	<!-- <div class="col-md-6">
		 		<p> ORDER NUMBER 
		 		<?php 
				if (isset($_GET['ORDEREDNUM'])) {
					// Sanitize and escape the input
					$orderedNum = intval($_GET['ORDEREDNUM']);
		 			$query="SELECT sum(ORDEREDQTY) as 'countitem' FROM `tblorder` WHERE `ORDEREDNUM` = $orderedNum";
		 			$mydb->setQuery($query);
					$res = $mydb->loadResultList();
					?>
		 		<p>Items to be pickup : <?php
		 		foreach ( $res as $row) echo $row->countitem; ?></p> 
		 	</div> -->
		 	<div class="col-md-6">
		 	<p>Name : <?php echo $cur->FNAME . ' '.  $cur->LNAME ;?></p>
		 	<p>Address : <?php echo $cur->CUSHOMENUM . ' ' . $cur->STREETADD . ' ' .$cur->BRGYADD . ' ' . $cur->CITYADD . ' ' .$cur->PROVINCE . ' ' .$cur->COUNTRY; ?></p>
		 		<!-- <p>Contact Number : <?php echo $cur->CONTACTNUMBER;?></p> -->
		 	</div>
		 </div>
<?php 
}elseif ($cur->PAYMENTMETHOD=="Cash on Delivery"){
		 
?>
 	 <h4>Your order has been confirmed and delivered</h4><br/>
 		<h5>DEAR Ma'am/Sir ,</h5>
		<h5>Your order is on its way! As you have ordered via Cash on Delivery, please have the exact amount of cash for our deliverer.	</h5>
		 <hr/>
		 <h4><strong>Delivery Information</strong></h4>
		 <div class="row">
		 	<div class="col-md-6">
		 		<p> ORDER NUMBER : <?php echo $_SESSION['ordernumber']; ?></p>

		 			<?php 
					if (isset($_GET['ORDEREDNUM'])) {
						// Sanitize and escape the input
						$orderedNum = intval($_GET['ORDEREDNUM']);
		 			$query="SELECT sum(ORDEREDQTY) as 'countitem' FROM `tblorder` WHERE `ORDEREDNUM` = $orderedNum";
		 			$mydb->setQuery($query);
					$res = $mydb->loadResultList();
					?>
		 		<p>Items to be delivered : <?php
		 		foreach ( $res as $row) echo $row->countitem; ?></p> 

		 	</div>
		 	<div class="col-md-6">
		 	<p>Name : <?php echo $cur->FNAME . ' '.  $cur->LNAME ;?></p>
		 	<!-- <p>Address : <?php echo $cur->ADDRESS;?></p> -->
		 		<!-- <p>Contact Number : <?php echo $cur->CONTACTNUMBER;?></p> -->
		 	</div>
		 </div>
<?php
}
}}}}

?>	<center>
<img src="../services/img/meg.png" style="width:40%"></img><br>
	<font color="black"><b> Megh Singh Cushion Makers Limited </b>
<h6>NAIROBI - KENYA <br>
Tel: +254 719 080 000 <br>
Email: info@meghsingh.co.ke <br></h6></font>
</center>
<hr/>
 <center><font color="green"><h4><strong>Customer Copy</strong></h4></font></center>
 <tfoot >
 <?php 
	if (isset($_GET['ORDEREDNUM'])) {
		// Sanitize and escape the input
		$orderedNum = intval($_GET['ORDEREDNUM']);
		$query = "SELECT * FROM `tblsummary` s, `tblcustomer` c 
				  WHERE s.`CUSTOMERID` = c.`CUSTOMERID` AND s.`ORDEREDNUM` = $orderedNum";
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();

		if ($cur->PAYMENTMETHOD == "Cash on Delivery") {
			$price = $cur->DELFEE;
		} else {
			$price = 0.00;
		}
	}
?>

</tfoot>
</table> 

<div class="container" style="padding-left:2%">
	<div class="col-md-6 pull-left">
		<h6>
			<div>Customer Name: <?php echo $cur->FNAME; ?>&nbsp;<?php echo $cur->LNAME; ?></div>
			<div>Tel: <?php echo $cur->PHONE; ?></div>
			<div>Email: <?php echo $cur->EMAIL; ?></div>
		</h6>
	</div>
</div>

<hr>
<table id="table table-responsive " class="table table-bordered table-responsive" style="padding-left:2%">
	<thead>
		<tr>
			<th>PRODUCT</th>
			<th>MODEL NUM</th>
			<th>PRICE</th>
			<th>QUANTITY</th>
			<th>TOTAL PRICE</th>
			<th></th> 
		</tr>
	</thead>
	<tbody>
		<?php
			if (isset($_GET['ORDEREDNUM'])) {
				// Sanitize and escape the input
				$orderedNum = intval($_GET['ORDEREDNUM']);
				$subtot = 0;
				$query = "SELECT * 
						  FROM `tblproduct` p, `tblcategory` ct, `tblcustomer` c, `tblorder` o, `tblsummary` s
						  WHERE p.`CATEGID` = ct.`CATEGID` 
						  AND p.`PROID` = o.`PROID` 
						  AND o.`ORDEREDNUM` = s.`ORDEREDNUM` 
						  AND s.`CUSTOMERID` = c.`CUSTOMERID` 
						  AND o.`ORDEREDNUM` = $orderedNum";
				$mydb->setQuery($query);
				$cur = $mydb->loadResultList(); 
				foreach ($cur as $result) {
					echo '<tr>';  
					echo '<td>'. $result->OWNERNAME.'</td>';
					echo '<td>'. $result->MODELNUM.'</td>';
					echo '<td> Ksh '. number_format($result->PROPRICE,2).' </td>';
					echo '<td align="center">'. $result->ORDEREDQTY.'</td>';
					echo '<td> Ksh <output>'. number_format($result->ORDEREDPRICE,2).'</output></td>'; 
					echo '</tr>';
					$subtot += $result->ORDEREDPRICE;
				}
			}
		?> 
	</tbody>
</table>
		<tfoot >
		<?php 
if (isset($_GET['ORDEREDNUM'])) {
    // Sanitize and escape the input
    $orderedNum = intval($_GET['ORDEREDNUM']);
    $query = "SELECT * FROM `tblsummary` s ,`tblcustomer` c 
              WHERE s.`CUSTOMERID`=c.`CUSTOMERID` AND s.`ORDEREDNUM`='$orderedNum'";
    $mydb->setQuery($query);
    $cur = $mydb->loadSingleResult();

    if ($cur->PAYMENTMETHOD == "Cash on Delivery") {
        $price = $cur->DELFEE;
    } else {
        $price = 0.00;
    }
}
?>


	 </tfoot>
       </table> <hr/>
 		<div class="container" style="padding-left:2%">
		  	<div class="col-md-6 pull-left">
		  	<h6> <div>Ordered Date : <?php echo date_format(date_create($cur->ORDEREDDATE),"M/d/Y h:i:s"); ?></div> 
		  		<div>Payment Method : <?php echo $cur->PAYMENTMETHOD; ?></div><hr></h6>

		  	</div>
		  	<div class="col-md-6 pull-right" style="padding-right:2%">
		  	<h6>	<p align="right">Total Price : Ksh <?php echo number_format($cur->PAYMENT-$cur->DELFEE,2);?></p>
				<p align="right">Delivery Fee : Ksh<?php echo $cur->DELFEE; ?></p>
		  		<p align="right">Overall Price : Ksh <?php echo number_format($cur->PAYMENT,2); ?></p></h6>
		  	</div>
		  </div>
		 
		  <?php
		  if($cur->ORDEREDSTATS=="Confirmed"){
		  ?>
		   <hr/> 
		  <?php }?>
  </div> 

</span>

		
		<!-- <button class="btn btn-primary"
			name="savephoto" type="submit">Upload Photo</button> -->
		</div>
	<!-- </form> -->
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
 </div>
  <script>
function tablePrint(){ 
 // document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
     // document.all.divButtons.style.visibility = 'Show';  
   
    return false; 

    } 
 
</script>