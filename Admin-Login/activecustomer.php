<?php $page='student';
include("php/connect.php");
include("php/checklogin.php");
$errormsg = '';
$action = "add";

$id="";
$emailid='';
$first_name='';
$last_name='';
$gender = '';
$remark='';
$contact='';
$address='';


if(isset($_POST['save']))
{

$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
$gender = mysqli_real_escape_string($conn,$_POST['gender']);
$contact = mysqli_real_escape_string($conn,$_POST['contact']);
$emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
$address = mysqli_real_escape_string($conn,$_POST['address']);

 if($_POST['action']=="add")
 {
  $q1 = $conn->query("INSERT INTO student (first_name,last_name,contact,gender,emailid,address) VALUES ('$first_name','$last_name','$contact','$gender','$emailid','$address')") ;
  
  $sid = $conn->insert_id;
  header("location: pendingcustomer.php?act=1");
 
 }



}




if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("UPDATE  tblcustomer set STATUS = '2'  WHERE CUSTOMERID='".$_GET['CUSTOMERID']."'");	
header("location: activecustomer.php?act=3");

}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM student WHERE id='".$id."'");
if($sqlEdit->num_rows)
{
$rowsEdit = $sqlEdit->fetch_assoc();
extract($rowsEdit);
$action = "update";
}else
{
$_GET['action']="";
}

}


if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>New Customer record has been added!</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Customer record has been updated!</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Customer has been deactivated!</div>";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN PANEL</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<link href="css/ui.css" rel="stylesheet" />
	<link href="css/datepicker.css" rel="stylesheet" />	
	
    <script src="js/jquery-1.10.2.js"></script>
	
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
   
	
</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Active Customers  
						<!--<?php
						echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
						' <a href="activecustomer.php" class="btn btn-success btn-sm pull-right" style="border-radius:0%">Go Back </a>':'<a href="activecustomer.php?action=add" class="btn btn-danger btn-sm pull-right" style="border-radius:0%"><i class="glyphicon glyphicon-plus"></i> Add New Customer</a>';
						?>-->
						</h1>
                     
<?php

echo $errormsg;
?>
                    </div>
                </div>
				
				
				
        <?php 
		 if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
		 {
		?>
		
			<script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
                <div class="row">
				
                    <div class="col-sm-10 col-sm-offset-1">
               <div class="panel panel-success">
                        <div class="panel-heading">
                           <?php echo ($action=="add")? "Add Customer Details": "Edit Customer Details"; ?>
                        </div>
						<form action="activecustomer.php" method="post" id="signupForm1" class="form-horizontal">
                        <div class="panel-body">
						<fieldset class="scheduler-border" >
						 <legend  class="scheduler-border">Customer Information:</legend>
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">First Name* </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Enter Your First Name" id="first_name" name="first_name" value="<?php echo $first_name;?>"  />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Last Name* </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="last_name" placeholder="Enter Your Last Name" name="last_name" value="<?php echo $last_name;?>"  />
								</div>
							</div>
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Phone Number* </label>
								<div class="col-sm-10">
									<input type="tel" class="form-control" placeholder="0710900900" id="contact" minlength="10" maxlength="10" name="contact" value="<?php echo $contact;?>" maxlength="10" />
								</div>
							</div>
							
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Gender* </label>
								<div class="col-sm-10">
									<select  class="form-control" id="gender" name="gender" >
									<option value="" >Select Gender</option>
									<option value="male" >Male</option>
									<option value="female" >Female</option>
									<option value="other" >Other</option>
									</select>
								</div>
						</div>
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Email Id </label>
								<div class="col-sm-10">
									
									<input type="text" class="form-control" placeholder="Enter Your Email Address" id="emailid" name="emailid" value="<?php echo $emailid;?>"  />
								</div>
						    </div>
						
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Address </label>
								<div class="col-sm-10">
									
									<input type="text" class="form-control" placeholder="Enter Your Full Address" id="address" name="address" value="<?php echo $address;?>"  />
								</div>
						    </div>
						
						<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" name="id" value="<?php echo $id;?>">
								<input type="hidden" name="action" value="<?php echo $action;?>">
								
									<button type="submit" name="save" class="btn btn-success" style="border-radius:0%">Save </button>
								 
								   
								   
								</div>
							</div>
                         
                           
                           
                         
                           
                         </div>
							</form>
							
                        </div>
                            </div>
            
			
                </div>
               

			   
			   
		<script type="text/javascript">
		

		$( document ).ready( function () {			
			
		$( "#gender" ).datepicker({
dateFormat:"yy-mm-dd",
changeMonth: true,
changeYear: true,
yearRange: "1970:<?php echo date('Y');?>"
});	
		

		
		if($("#signupForm1").length > 0)
         {
		 
		 <?php if($action=='add')
		 {
		 ?>
		 
			$( "#signupForm1" ).validate( {
				rules: {
					sname: "required",
					gender: "required",
					emailid: "email",
					grade: "required",
					
					
					contact: {
						required: true,
						digits: true
					},
					
					fees: {
						required: true,
						digits: true
					},
					
					
					advancefees: {
						required: true,
						digits: true
					},
				
					
				},
			<?php
			}else
			{
			?>
			
			$( "#signupForm1" ).validate( {
				rules: {
					sname: "required",
					gender: "required",
					emailid: "email",
					grade: "required",
					
					
					contact: {
						required: true,
						digits: true
					}
					
				},
			
			
			
			<?php
			}
			?>
				
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-10" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
			
			}
			
		} );
		
		
		
		$("#fees").keyup( function(){
		$("#advancefees").val("");
		$("#balance").val(0);
		var fee = $.trim($(this).val());
		if( fee!='' && !isNaN(fee))
		{
		$("#advancefees").removeAttr("readonly");
		$("#balance").val(fee);
		$('#advancefees').rules("add", {
            max: parseInt(fee)
        });
		
		}
		else{
		$("#advancefees").attr("readonly","readonly");
		}
		
		});
		
		
		
		
		$("#advancefees").keyup( function(){
		
		var advancefees = parseInt($.trim($(this).val()));
		var totalfee = parseInt($("#fees").val());
		if( advancefees!='' && !isNaN(advancefees) && advancefees<=totalfee)
		{
		var balance = totalfee-advancefees;
		$("#balance").val(balance);
		
		}
		else{
		$("#balance").val(totalfee);
		}
		
		});
		
		
	</script>


			   
		<?php
		}else{
		?>
		
		 <link href="css/datatable/datatable.css" rel="stylesheet" />
		 
		
		 
		 
		<div class="panel panel-default">
                        <div class="panel-heading">
                            Active Customers  
                        </div>
                        <div class="panel-body">
                            <div class="table-sorting table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
										<th>#</th>
                                            <th>Full Name</th>
											<th>Phone Number</th>
											<th>Email</th>
                                            <th>Gender</th>
                                            <th>Address</th>
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "select * from tblcustomer where STATUS='1'";
									$q = $conn->query($sql);
									$i=1;
									while($r = $q->fetch_assoc())
									{
									
										echo '<tr '.(($r['STATUS']=1)?'class="primary"':'').'>
                                            <td>'.$i.'</td>
											<td>'.$r['FNAME'].' '.$r['LNAME'].'</td>
											<td>'.$r['PHONE'].''.'</td>
											<td>'.$r['EMAIL'].''.'</td>
											<td>'.$r['GENDER'].''.'</td>
                                            <td>'.$r['CITYADD'].'</td>
											<td>
											
											
											
			
											<a onclick="return confirm(\'Are you sure you want to deactivate this record\');" href="activecustomer.php?action=delete&CUSTOMERID='.$r['CUSTOMERID'].'" class="btn btn-danger btn-xs" style="border-radius:60px;">Deactivate <span class="glyphicon glyphicon-remove"></span></a> </td>
											
                                        </tr>';
										$i++;
									}
									?>
									
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     
	<script src="js/dataTable/jquery.dataTables.min.js"></script>
    
     <script>
         $(document).ready(function () {
             $('#tSortable22').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": true });
	
         });
		 
	
    </script>
		
		<?php
		}
		?>
				
				
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    
   
  
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>

    
</body>
</html>
