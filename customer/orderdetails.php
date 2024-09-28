<?php
if (!isset($_SESSION['CUSID'])) {
    header("Location: " . web_root . "index.php");
    exit;
}

$customerid = $_SESSION['CUSID']['CUSTOMERID'];
$customer = new Customer();
$singlecustomer = $customer->single_customer($customerid);

$autonumber = new Autonumber();
$res = $autonumber->set_autonumber('ordernumber');

?>

<form onsubmit="return orderFilter()" action="customer/controller.php?action=processorder" method="post">
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <button class="btn btn" style="background-color:#130238"><a href="#"><font color="black">Home</font></a></button>
                <button class="btn btn" style="background-color:#130238" ><font color="black">Order Details</font></button>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 pull-left">
                    <div class="col-md-10 col-lg-12 col-sm-8">
                        <input type="hidden" value="<?php echo $res->AUTO; ?>" id="ORDEREDNUM" name="ORDEREDNUM">
                        Order Number: <?php echo $res->AUTO; ?>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="table">
                    <thead style="background-color:white">
                        <tr class="cart_menu">
                            <th><font color="black">Product</font></th>
                            <th><font color="black">Name</font></th>
                            <th><font color="black">Quantity</font></th>
                            <th><font color="black">Price</font></th>
                            <th style="width:15%; align:center;"><font color="black">Total</font></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tot = 0;
                        if (!empty($_SESSION['gcCart'])) {
                            $count_cart = count($_SESSION['gcCart']);
                            for ($i = 0; $i < $count_cart; $i++) {
                                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  and p.PROID='" . $_SESSION['gcCart'][$i]['productid'] . "'";
                                $mydb->setQuery($query);
                                $cur = $mydb->loadResultList();
                                foreach ($cur as $result) {
                                    $tot += $_SESSION['gcCart'][$i]['price'];
                        ?>
                                    <tr>
                                        <td><img src="admin/products/<?php echo $result->IMAGES ?>"  width="50px" height="50px"></td>
                                        <td style="color:black"><?php echo $result->OWNERNAME; ?></td>
                                        <td align="center" style="color:black"><?php echo $_SESSION['gcCart'][$i]['qty']; ?></td>
                                        <td style="color:black">Ksh <?php echo  $result->PRODISPRICE ?></td>
                                        <td style="color:black">Ksh <output><?php echo $_SESSION['gcCart'][$i]['price'] ?></output></td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right" style="color:black">
                    <p align="right">
                        <div>Total Price: Ksh <span id="sum"><?php echo number_format($tot, 2); ?></span></div>
                        <div>Delivery Fee: Ksh <span id="fee">0.00</span></div>
                        <div>Overall Price: Ksh <span id="overall"><?php echo number_format($tot, 2); ?></span></div>
                        <input type="hidden" name="alltot" id="alltot" value="<?php echo $tot; ?>" />
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="form-group">
                    <label>Payment Details:</label>
                        <div class="radio">
                            <label>
                              <select>
    <option value="">View</option>
    <option >M-Pesa: <br>Till Number : 12345<br></option>
    <option >Equity Bank: <br>   Account No: 67674545</option>
    <option >Kenya Commercial Bank: <br>   Account No: 8989890</option>
    <option>Family Bank: <br>   Account No: 98798765</option>
    <option>Cooperative Bank: <br>   Account No: 45674567</option>
</select>
                            </label>
                        </div>
                    
                        <label>Payment Method:</label>
                        <div class="radio">
                            <label>
                              <select name="paymethod" id="paymentmethod" onchange="updateTransactionCodeInput()">
    <option value="">Select</option>
    <option value="M-Pesa">M-Pesa</option>
    <option value="Equity Bank">Equity Bank</option>
    <option value="Kenya Commercial Bank">Kenya Commercial Bank</option>
    <option value="Family Bank">Family Bank</option>
    <option value="Cooperative Bank">Cooperative Bank</option>
</select>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Delivery County:</label>
                        <div class="radio">
                            <label>
                                <select class="form-control paymethod" name="PLACE" id="PLACE" onchange="validateDate()" required>
                                    <option value="0">Select County</option>
                                    <?php
                                    $query = "SELECT * FROM `tbl_country`";
                                    $mydb->setQuery($query);
                                    $cur = $mydb->loadResultList();

                                    foreach ($cur as $result) {
                                        echo '<option value="' . $result->price . '">' . $result->country_name . ' - Delivery Fee: (Ksh ' . $result->price . ')</option>';
                                    }
                                    ?>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>More Location Details (Include Landmarks):</label>
                        <div class="radio">
                            <label>
                                <textarea type="text" clos="15" rows="6" name="LOCATIONDETAILS" class="form-control" required></textarea>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
    <label>Transaction Code: <br><i>(Example;<br> For M-Pesa;- RRJ34964G3<br> For Bank ;- 232345678906)</i></label>
    <div class="radio">
        <label>
            <input type="text" class="form-control" 
                   name="TRANSACTIONCODE" maxlength="12" id="TRANSACTIONCODE" required
                   title="Invalid Transaction Code">
        </label>
    </div>
</div>

                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-6">
                    <a href="index.php?q=cart" class="btn btn-info pull-left"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>View Cart</strong></a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-pup btn-success pull-right" name="btn" id="btn" onclick="return validateDate();">Submit Order <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
            </div>
        </div>
    </section>
</form>

<script>
    function validateDate() {
        var place = document.getElementById("PLACE").value;
        var fee = document.getElementById("fee");
        var overall = document.getElementById("overall");
        var sum = document.getElementById("sum");
        var alltot = document.getElementById("alltot");

        if (place != "") {
            fee.innerHTML = parseFloat(place).toFixed(2);
            var total = parseFloat(sum.innerHTML) + parseFloat(place);
            overall.innerHTML = total.toFixed(2);
            alltot.value = total.toFixed(2);
            return true;
        } else {
            fee.innerHTML = "0.00";
            overall.innerHTML = sum.innerHTML;
            alltot.value = sum.innerHTML;
            return true;
        }
    }
</script>
<script>
    function updateTransactionCodeInput() {
        var paymethod = document.getElementById("paymentmethod").value;
        var transactionCodeInput = document.getElementById("TRANSACTIONCODE");

        // Reset the transaction code input
        transactionCodeInput.value = "";
        transactionCodeInput.pattern = ""; // Reset the pattern

        // If payment method is not M-Pesa, set pattern and length restrictions
        if (paymethod !== "M-Pesa") {
            transactionCodeInput.pattern = "^[0-9]{12}$"; // Only one uppercase letter
            transactionCodeInput.minLength = 12;
            transactionCodeInput.maxLength = 12;
        } else {
            // pattern="^(?=.*[A-Z])(?=.*[0-9])[A-Z0-9]{10}$" 
            // Reset the pattern and length for M-Pesa
            transactionCodeInput.pattern = "^(?=.*[A-Z])(?=.*[0-9])[A-Z0-9]{10}$" ; // Only one uppercase letter
            transactionCodeInput.minLength = 10;
            transactionCodeInput.maxLength = 10;
        }
    }
</script>

