
<div class="container">
	<?php
		 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

		check_message();
			
		?>

 
 	<div class="result">
       	 <div class="col-lg-12">
            <h4 class="page-header">Material Record</h4>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			 
			    <form action="controller.php?action=delete" Method="POST">  					
				 <div class="table-responsive">	
                  <table id="example" class="table  table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
			 		<thead>
			 		<tr >
				  		<th>#</th>
				  		<th>Grain Variety</th>
				  		<th>Quantity</th> 
				  		<th >Description</th>
				 
				  	</tr>	
			   		</thead>
			   		<tbody>
					<?php 
				  		$query = "SELECT * FROM `requests` s ,`tbluseraccount` c 
				  				WHERE   s.`supplier`=c.`EMAIL` ORDER BY   `date_created` desc ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
						?>

					<?php
						echo '<tr>';
				  		echo '<td width="3%" align="center"></td>';
				  		echo '<td><'.$result->varietyName.'">'.$result->varietyName .'</a> </td>';  
				  		echo '<td>'.$result->quantity.'</td>';
				  		echo '<td>'.$result->specs.'</td>';
				  		// echo '<td></td>';
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
						
	</div><!-- /.modal -->
