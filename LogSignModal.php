 <!-- sign up modal -->
 <div class="modal fade" id="smyModal" tabindex="-1">
 
 <div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">
     
      <div class="modal-body">
         
              <!-- Nav tabs -->

              <ul class="nav nav-pills">
                  <li class="active"><a class="btn btn-default check_out" href="#home" data-toggle="tab">Login</a>
                  </li>
                  <li><a class="btn btn-default check_out" href="#profile" data-toggle="tab">Sign Up</a>
                  </li>
                  
              </ul>

              <!-- Tab panes  login panel-->
              <div class="tab-content">
                  <div class="tab-pane fade in active" id="home">
                      <!-- <h4>Login Tab</h4>  -->
                       <div class="panel panel-pup">
                        <div class="panel-heading">
                            Login Details
                        </div>
                        <div class="panel-body">

                           <form class="form-horizontal span6" name=""  action="login.php" method="POST">
                              <input class="proid" type="hidden" name="proid" id="proid" value="">
                                <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "U_USERNAME">Username:</label>
                                    
                                    <div class="col-md-8">
                                       <input   id="U_USERNAME" name="U_USERNAME" placeholder="Username" type="text" class="form-control input-sm" > 
                             
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "U_PASS">Password:</label>
                                    
                                    <div class="col-md-8">
                                     <input name="U_PASS" id="U_PASS" placeholder="Password" type="password" class="form-control input-sm">
                            
                                    </div>
                                  </div>
                                </div>

                                  <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "FIRSTNAME"> </label>
                                    
                                    <div class="col-md-8">
                                    <button type="submit" id="modalLogin" name="modalLogin" class="btn btn-pup"><span class="glyphicon glyphicon-log-in "></span>   Login</button> 
                                     <button class="btn btn-default" data-dismiss="modal" type="button">Close</button> 
                                    </div>
                                  </div>
                                </div>

 
                            </form>

                       </div>
                    </div> 
                  </div>
                  <!-- end login panel -->

                  <!-- sign in panel -->
                  <div class="tab-pane fade" id="profile">
                      <!-- <h4>Customer Details</h4>  --> 

                           <form  class="form-horizontal span6" action="customer/controller.php?action=add"  method="POST" enctype="multipart/form-data">
                                <div class="panel panel-pup">
                                    <div class="panel-heading">
                                       Customer Details
                                    </div>
                                     <div class="panel-body">
                                      <input class="proid" type="hidden" name="proid" id="proid" value="">
                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "FNAME">First Name:</label>
                                          <!-- <input  id="CUSTOMERID" name="CUSTOMERID"  type="HIDDEN" value="<?php echo $res->AUTO; ?>">  -->
                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                                                "First Name" type="text" value="" required>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "LNAME">Last Name:</label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                                                "Last Name" type="text" value="" required>
                                          </div>
                                        </div>
                                      </div>

                                       <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "GENDER">Gender:</label>

                                          <div class="col-md-8">
                                            <input  id="GENDER" name="GENDER" placeholder=
                                                "Gender" type="radio" checked="true" value="Male"><b> Male </b>
                                                <input   id="GENDER" name="GENDER" placeholder=
                                                "Gender" type="radio" value="Female">  <b> Female </b>
                                          </div>
                                        </div>
                                      </div>

                                       <div class="form-group">
                                            <div class="col-md-10">
                                              <label class="col-md-4 control-label" for=
                                              "CITYADD">County:</label>

                                              <div class="col-md-8">
                                                 <input class="form-control input-sm" id="CITYADD" name="CITYADD" placeholder=
                                                    "Enter Your Address" type="text" value="" required>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="col-md-10">
                                              <label class="col-md-4 control-label" for=
                                              "CITYADD">Email:</label>

                                              <div class="col-md-8">
                                                 <input class="form-control input-sm" id="EMAIL" name="EMAIL" placeholder=
                                                    "Enter Your Email" type="email" value="" required>
                                              </div>
                                            </div>
                                          </div>
                                  
                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "CUSUNAME">Username:</label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="CUSUNAME" name="CUSUNAME" placeholder=
                                                "Username" type="text" value="" required>
                                          </div>
                                        </div>
                                      </div> 
                                      
                                       <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "CUSPASS">Password:</label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="CUSPASS" name="CUSPASS" placeholder=
                                                "Password" type="password" value="" required><span></span>
                                          </div>
                                        </div>
                                      </div>

 
                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "PHONE">Phone Number:</label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="PHONE" minlength="10" maxlength="10" name="PHONE" placeholder=
                                                "0700 456 678" type="tel" value="">
                                          </div>
                                        </div>
                                      </div>

                          
                                      
                                      <div class="form-group">
                                        <div class="col-md-10">
                                           <label class="col-md-4" align = "right"for=
                                          "image"></label>
                                          <div class="col-md-8">
                                            <input type="submit"  name="submit"  value="Sign Up"  class="submit btn btn-pup"  />
                                             <button class="btn btn-default" data-dismiss="modal" type=
                                                "button">Close</button> 
                                          </div>
                                        </div>
                                      </div> 

                                        

                                     </div>
                            </div> 
                            <!-- end panel sign up -->
                        </form>  
                   </div> 
              </div>
         
              
          </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
  </div>
<!-- end sign up modal -->


<!-- sign up modal -->
<div class="modal fade" id="staffModal" tabindex="-1">
 
 <div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">
     
      <div class="card" style="background-color:">
         
              <!-- Nav tabs --><br>
<center><h2><font color="maroon">STAFF LOGIN PAGE</font></h2></center>
              <ul class="nav nav-pills">
            <!--  <center><button class="btn btn-warning btn-sm"><a href="admin/index.php"><font color="white">Inventory Manager</font></a></button>  <br>  <br>       
              <button class="btn btn-warning btn-sm"><a href="dispatch/index.php"><font color="white">Dispatch Manager</font></a></button><br><br> 
               <button class="btn btn-warning btn-sm"><a href="manager/index.php"><font color="white">Service Manager</font></a></button><br><br> 
                  <button class="btn btn-warning btn-sm"><a href="supplier/index.php"><font color="white">Supplier Login</font></a></button><br><br> 
                 <button class="btn btn-warning btn-sm"><a href="supervisor/index.php"><font color="white">Supervisor Login</font></a></button><br><br>
                  <button class="btn btn-warning btn-sm"><a href="finance/index.php"><font color="white">Finance Login</font></a></button><br><br> 
                  <button class="btn btn-warning btn-sm"><a href="driver/index.php"><font color="white">Driver Login</font></a></button>  <br><br>       
                  <button class="btn btn-warning btn-sm"><a href="technician/index.php"><font color="white">Technician</font></a></button><br><br>
                  <button class="btn btn-danger btn-block"><a href="index.php"><font color="white">Exit</font></a></button></center>
                    </div> 
                  </div>-->
              <center>
            <form id="pageSelector">
                <select class="btn btn-sm btn-primary" id="pageSelect">
                    <option value="">Select Role</option>
                    <option value="admin/index.php"><button class="btn btn-lg">Inventory Manager</button></option>
                    <option value="dispatch/index.php">Dispatch Manager</option><hr>
                    <option value="finance/index.php">Finance Manager</option>
                    <option value="driver/index.php">Driver</option>
                    <option value="manager/index.php">Service Manager</option>
                   <!-- <option value="supplier/index.php">Supplier</option>-->
                    <option value="supervisor/index.php">Supervisor</option>
                    <option value="technician/index.php">Technician</option>
                    <option value="supplier/index.php">Supplier</option>
                </select><br><br>
                <button type="button" class="btn btn-sm btn-info" onclick="goToSelectedPage()">Go To Login</button>
            </form>
        </center> <hr>        
                  <button class="btn btn-danger  "><a href="index.php"><font color="white">Exit</font></a></button></center>
                    </div> 
                  </div>
                  <!-- end login panel -->

              
          </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
  </div>
<!-- end sign up modal -->

<script>
    function goToSelectedPage() {
        var selectElement = document.getElementById("pageSelect");
        var selectedValue = selectElement.value;
        if (selectedValue) {
            window.location.href = selectedValue;
        }
    }
</script>

<script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4;  // for 25% - devide by 4  |  for 33% - devide by 3
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        } 
    </script>