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

<form onsubmit="return orderFilter()" action="customer/controller2.php?action=processorder" method="post">
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <button class="btn btn" style="background-color:#130238"><a href="#"><font color="white">Home</font></a></button>
                <button class="btn btn" style="background-color:#130238" ><font color="white">Order Details</font></button>
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
                   
                    
                    <label>Payment Method:</label><br><hr>
                        <label style="color:red">Till Number:335242</label><br>
                        <label style="color:">Pay Via</label>
                        <div class="radio">
                            <label>
                                <select name="paymethod" id="deliveryfee">
                                    <option value="">Select</option>
                                    <option value="M-Pesa">M Pesa</option>
                                </select>
                            </label>
                        </div>
                    </div>
                   
                    
                    <div class="form-group">
                        <label>Transaction Code:<br>
                    </label><br>
                    <label style="color:red">Eg. JSQ36HE74J</label><br>
                        <div class="radio">
                        <label>
            <input type="text" minlength="10" maxlength="10" class="form-control" 
                   pattern="^(?=.*[A-Z])(?=.*[0-9])[A-Z0-9]{10}$" 
                   name="TRANSACTIONCODE" id="TRANSACTIONCODE" required
                   title="Invalid M-Pesa Code">
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
