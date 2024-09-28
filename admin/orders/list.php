<!DOCTYPE html>
<html>
<head>
	<!-- Add necessary meta tags, CSS, and JS links here -->
</head>
<body>
	<div class="container">
		<?php
		// Check if the user is logged in; if not, redirect to the admin index page
		if (!isset($_SESSION['USERID'])) {
			redirect(web_root."admin/index.php");
		}

		check_message();
		?>

		<div class="row">
			<div class="col-lg-12">
				<h4 class="page-header">List of Orders</h4>
			</div>
		</div>

		<form action="controller.php?action=delete" method="POST">
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered table-hover" style="font-size: 12px" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Order#</th>
							<th>Customer</th>
							<th>DateOrdered</th>
							<th>Price</th>
							<th>Payment Status</th>
							<th>Status</th>
							<th>Customer Comment</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM `tblsummary` s, `tblcustomer` c 
								  WHERE s.`CUSTOMERID`=c.`CUSTOMERID` ORDER BY `ORDEREDNUM` DESC";
						$mydb->setQuery($query);
						$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
							?>

							<?php
							echo '<tr>';
							echo '<td width="3%" align="center"></td>';
							echo '<td><a href="#" title="View list Of ordered" data-target="#myModal" data-toggle="modal" class="orders" data-id="'.$result->ORDEREDNUM.'">'.$result->ORDEREDNUM.'</a> </td>';
							echo '<td><a href="index.php?view=customerdetails&customerid='.$result->CUSTOMERID.'" title="View customer information">'. $result->FNAME.' '. $result->LNAME.'</a></td>';
							echo '<td>'. date_format(date_create($result->ORDEREDDATE),"M/d/Y h:i:s").'</td>';
							echo '<td>Ksh '.number_format($result->PAYMENT, 2).'</td>';
							echo '<td>'.$result->PAYMENT_STATUS.'</td>';
							echo '<td>'. $result->ORDEREDSTATS.'</td>';
							echo '<td><b>Status :</b>'. $result->GOODSSTATUS.' <br>'. $result->CUSTCOMMENT.'</td>';

							if ($result->ORDEREDSTATS == 'Waiting For Confirmation') {
								if ($result->PAYMENT_STATUS == 'Approved') {
									echo '<td>
										  <a href="updateorder.php?SUMMARYID='.$result->SUMMARYID.'&task1=Confirmed" class="btn btn-success btn-xs" style="width: 100%; margin-bottom: 4px;">Confirm</a><br>
										  <a href="cancelorder.php?SUMMARYID='.$result->SUMMARYID.'&task1=Confirmed" class="btn btn-danger btn-xs" style="width: 100%; margin-bottom: 4px;">Cancel</a>
										  </td>';
								}
							} elseif ($result->ORDEREDSTATS == 'Confirmed') {
								echo '<td><a href="#" class="btn btn-success btn-xs" disabled>Confirmed</a></td>';
							} else {
								echo '<td> <a href="#" class="btn btn-default btn-xs" disabled>In Process</a></td>';
							}
							echo '</tr>';
						}
						?>
					</tbody>
				</table>
				<div class="btn-group">
				</div>
			</div>
		</form>

		<div class="modal fade" id="myModal" tabindex="-1">
			<!-- Modal content goes here -->
		</div>
	</div>
</body>
</html>
