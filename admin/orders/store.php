
<div class="container">
	<?php
		 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

		check_message();
			
		?>

 
 	<div class="result">
       	 <div class="col-lg-12">
            <h4 class="page-header">Raw Material</h4>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			 
			    <form action="controller.php?action=delete" Method="POST">  					
				 <div class="table-responsive">	
				 <table id="example" class="table  table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
	<thead>
		<tr>
			<th>#</th>
			<th>Maize Variety Name</th>
			<th>In Stock (Kgs)</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$query = "SELECT * FROM store";
			$mydb->setQuery($query);
			$cur = $mydb->loadResultList();

			$i = 1; // initialize the row counter

			foreach ($cur as $result) {
				echo '<tr>';
				echo '<td>' . $i . '</td>'; // display the row number
				echo '<td><'.$result->varietyName.'">'.$result->varietyName .'</a> </td>';  
				echo '<td>'.$result->qty.'</td>';
				echo '</tr>';
				$i++; // increment the row counter
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
