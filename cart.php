<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <button class="btn" style="background-color:#130238"><a href="#"><font color="black">Home</font></a></button>
      <button class="btn" style="background-color:#130238"><font color="black">Shopping Cart</font></button>
    </div>
    <hr>
    <div class="table-responsive cart_info"> 
      <?php  
        // if (!isset($_SESSION['USERID'])){
        //     redirect("index.php"); 
        check_message();  
      ?>
      <table class="table table-responsive table-bordered" id="table">
        <thead> 
          <tr> 
            <td><font color="black">Product</font></td>
            <td><font color="black">Name</font></td>
            <td><font color="black">Price</font></td>
            <td><font color="black">Quantity</font></td> 
            <td><font color="black">Total</font></td>  
          </tr>
        </thead>  
        <?php
          if (!empty($_SESSION['gcCart'])){ 
            echo '<script>totalprice()</script>';
            $count_cart = count($_SESSION['gcCart']);
            for ($i = 0; $i < $count_cart; $i++) { 
              $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                        WHERE pr.`PROID` = p.`PROID` AND p.`CATEGID` = c.`CATEGID` AND p.`PROID` = '".@$_SESSION['gcCart'][$i]['productid']."'";
              $mydb->setQuery($query);
              $cur = $mydb->loadResultList();
              foreach ($cur as $result) {
        ?>
        <tr>
          <td>  
            <img src="<?php echo web_root.'admin/products/'.$result->IMAGES; ?>" onload="totalprice()" width="50px" height="50px"> 
            <br/> 
            <!-- <?php    
              if (isset($_SESSION['CUSID'])){  
                echo '<a href="'.web_root.'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist">Add to wishlist</a>';
              } else {
                echo '<a href="#" title="Add to wishlist" class="proid" data-target="#smyModal" data-toggle="modal" data-id="'.$result->PROID.'">Add to wishlist</a>';
              } 
            ?> -->
          </td>
          <td>  
            <font color="black"><?php echo $result->OWNERNAME; ?></font>
          </td>
          <td>
            <input type="hidden" id="PROPRICE<?php echo $result->PROID; ?>" name="PROPRICE<?php echo $result->PROID; ?>" value="<?php echo $result->PRODISPRICE; ?>" >
            <font color="black">Ksh <?php echo $result->PRODISPRICE; ?></font>
          </td>
          <td class="input-group custom-search-form">
            <input type="hidden" maxlength="3" class="form-control input-sm" autocomplete="off" id="ORIGQTY<?php echo $result->PROID; ?>" name="ORIGQTY<?php echo $result->PROID; ?>" value="<?php echo $result->PROQTY; ?>" placeholder="Search for...">
            <input type="number" maxlength="3" data-id="<?php echo $result->PROID; ?>" class="QTY form-control input-sm" autocomplete="off" id="QTY<?php echo $result->PROID; ?>" name="QTY<?php echo $result->PROID; ?>" value="<?php echo $_SESSION['gcCart'][$i]['qty']; ?>" placeholder="Search for...">
            <span class="input-group-btn">
              <a title="Remove Item" class="btn btn-danger btn-sm" id="btnsearch" name="btnsearch" href="cart/controller.php?action=delete&id=<?php echo $result->PROID; ?>">
                <i class="fa fa-trash-o"></i>
              </a>
            </span>
          </td>
          <input type="hidden" id="TOT<?php echo $result->PROID; ?>" name="TOT<?php echo $result->PROID; ?>" value="<?php echo $result->PRODISPRICE; ?>">
          <td>
            <font color="black">Ksh <output id="Osubtot<?php echo $result->PROID; ?>"><?php echo $_SESSION['gcCart'][$i]['price']; ?></output></font>
          </td>
        </tr>
        <?php  
            }
          }
        } else { 
          echo "<h3><span style='color:red'>There is no item in the cart.</span></h3>";
        } 
        ?>  
      </table> 
      <font color="black"><h3 align="right">Total Ksh<span id="sum">0</span></h3></font>
    </div>
  </div>  
</section>

<section id="do_action">
  <div class="container">
    <div class="row">
      <form action="index.php?q=orderdetails" method="post">
        <a href="index.php?q=product" class="btn btn-info check_out pull-left" style="background-color:default">
          <i class="fa fa-arrow-left fa-fw"></i>
          Shop More
        </a>
        <?php    
          $countcart = isset($_SESSION['gcCart']) ? count($_SESSION['gcCart']) : "0";
          if ($countcart > 0){
            if (isset($_SESSION['CUSID'])){  
              echo '<button type="submit" name="proceed" id="proceed" class="btn btn-info check_out btn-pup pull-right" style="background-color:green">
              Checkout With Shipping
              <i class="fa fa-tick"></i>
            </button>
            <button  class="btn btn-primary check_out btn-pup pull-right" style="background-color:grey">
             <a href="index.php?q=without" style="color:white"> Checkout Without Shipping
              <i class="fa fa-tick"></i></a>
            </button>'
            ;
            } else {
                     echo   '<a href="logincus.php" class="btn btn-default check_out signup pull-right" style="background-color:green" href="">
                              Proceed And Checkout
                              <i class="fa fa-tick "></i>
                              </a>';
                  } 
                }



                ?>
 </form>
      </div>
    </div>
  </section><!--/#do_action-->