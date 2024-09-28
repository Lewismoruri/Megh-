<?php
session_start();
include('configcontact.php');
include('dbconnect.php');
include('conn.php');
include 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
    <script>
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxClassArms3.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<div class="container" style="margin-top:30px">
        <div class="row"><div class="container">    
    <a href="../../index.php"><button class="btn btn-sm btn-danger">Back</button></a>
</div><br><br>
            <div class="col-lg-6 col-md-6 col-12">
                Request Product<br>
<form action= "<?php echo $path ?>Upload/UploadProcess.php" method="post" enctype="multipart/form-data">


<div class="form-input py-2">
                        <div class="control-group form-group">
                        <div class="controls">
                        <label >Select Product</label>
                        <?php
                        $qry= "SELECT * FROM tblproduct";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="varietyName" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                          echo'<option value="">--Select Product--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['OWNERNAME'].'" >'.$rows['OWNERNAME'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                        </div>
                        <div class="control-group">
                        <label class="form-control-label">Current Selling Price<span class="text-danger ml-2">*</span></label>
                            <?php
                                echo"<div id='txtHint'></div>";
                            ?>
                        </div> 
                        
                        <div class="form-group">Quantity
                            <input type="number" class="form-control"    required name="quantity" >
                        </div>
                        <div class="form-group">Description
                            <textarea rows="5" type="text" class="form-control"   required name="specs" ></textarea>
                        </div>
                        <div class="control-group form-group">
                        <div class="controls">
                        <label >Supplier</label>
                        <?php
                      $qry= "SELECT * FROM tbluseraccount where U_ROLE='Supplier' and STATUS='1'";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="supplier" onchange="classArmDropdown(this.value)" class="form-control mb-1">';
                          echo'<option value="">--Select Supplier--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['EMAIL'].'" >'.$rows['U_NAME'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                        </div>

                        <div class="form-group">Requested By
                        <input name="DueDate" type="date" min="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <hr>                    
                        <div class="form-group" style="color:red">

                            <table width="350" border="0" cellpadding="1"
cellspacing="1" class="box">
<tr>
<input name="upload" type="submit" class="box" id="submit" value=" Submit "></td>
</tr>
</table>

                        </div>
                    </div>
					</div>  
                    </form>
        </div>
    </div>
</body>
</html>
