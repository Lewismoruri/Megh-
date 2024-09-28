
<div class="container">
	<?php
		 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

		check_message();
			
		?>

 
 	<div class="result">
       	 <div class="col-lg-12">
            <h4 class="page-header">Supplies Record</h4>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			 
			    <form action="controller.php?action=delete" Method="POST">  					
				 <div class="table-responsive">	
                  <table id="example" class="table  table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
			 		<thead>
			 		<tr >
				  		<th>#</th>
				  		<th>Name</th>
				  		<th>Quantity</th>
				  		<th>Price Per Unit</th>	 
				  		<th >Description</th>
				  	<!--	<th >Reject Reason</th>	-->
				  		<th>Status</th>
						  <th>Remark</th>
						<th>Supplier</th>
				  		<th width="100px">Action</th>
				 
				  	</tr>	
			   		</thead>
			   		<tbody>
					<?php 
				  		$query = "SELECT  * FROM `requests` s ,`tbluseraccount` c 
				  				WHERE   s.`supplier`=c.`EMAIL` ORDER BY   `date_created` desc ";

				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
						?>

					<?php
						echo '<tr>';
				  		echo '<td width="3%" align="center"></td>';
				  		echo '<td>'.$result->varietyName.'</td>';  
				  		echo '<td>'.$result->quantity.'</td>';
				  		echo '<td>'.$result->charges.'</td>';
				  		echo '<td>'.$result->specs.'</td>';
				  		//echo '<td >'.$result->reason .'</td>';
				  		// echo '<td></td>';
				  		echo '<td>'. $result->status.'</td>';
						  echo '<td>'. $result->remark.'</td>';
						echo '<td>'. $result->U_NAME.'</td>';
						echo '<td >
						  ';
						if($result->status=='Pay'){
							if($result->payStatus=='Pending'){?>
							<a href="approve-change-status.php?id=<?php echo $result->id; ?>&task=Confirmed"
							 class="btn btn-success btn-xs" style="width:100%;margin-bottom:4px;">Approve</a>	
					       <?php
					         }
				           }
				
		if($result->remark==''){
			if($result->status=='Received and Update'){
			?>
			<a href="received.php?id=<?php echo $result->id; ?>&task=Received" class="btn btn-primary btn-xs" style="width:100%;margin-bottom:4px;">Remark</a>
			
			<?php
	}
}
if($result->status=='Supplied'){
	?>
	<a href="update.php?varietyName=<?php echo $result->varietyName; ?>&task=Received and Update" class="btn btn-danger btn-xs" style="width:100%;margin-bottom:4px;">Receive & Update</a>
	
	<?php

}
if($result->status=='Received and Updated'){
	?>
	Already Updated
	
	<?php

}
			  	 		} 
						  
				  		// if($result->ORDEREDSTATS=='Pending'){
				  		// 		echo '<td><a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=cancel" class="btn btn-danger btn-xs">Cancel</a>
				  		// 		<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=confirm"  class="btn btn-primary btn-xs">Confirm</a></td>';
			  	 	// 	}elseif($result->ORDEREDSTATS=='Confirmed'){
				  	 // 			echo '<td><a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=cancel" class="btn btn-danger btn-xs">Cancel</a>
				  		// 		<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=deliver"  class="btn btn-success btn-xs">Deliver</a></td>';
				  	 		
			  	 	// 	}elseif($result->ORDEREDSTATS=='Delivered'){
			  	 	// 		  echo '<td> <a  href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&actions=confirm"  class="btn btn-success btn-xs" disabled>Delivered</a></td>';
				
			  	 	// 	}else{
			  	 	// 		 echo '<td> <a  href="#"  class="btn btn-danger btn-xs" disabled>Cancelled</a></td>';
				
			
			  	 	// 	} 
				  		echo '</tr>';
 
				  	
				  	?> 
				 </tbody>
				 	
				</table>
				<div class="btn-group">
				</div>
				</div>
				</form> 

  <div class="modal fade" id="myModal" tabindex="-1">
						
	</div><!-- /.modal -->
