
  <section>
    <div class=""> 
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h4 class=" text-center"><font color="black">OUR PRODUCTS</font></h4><br>

            <?php

            $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
           
            foreach ($cur as $result) { 

              ?>
               <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="double-products">
                    <div class="productinfo text-center">
                    <h4> <?php  echo $result->OWNERNAME; ?></h4>
                      <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>"  alt="" />
                      <h4> <font color="maroon"><b>Ksh <?php  echo $result->PRODISPRICE; ?> </b></font></h4>
                      <font color="maroon"><b>Description : </b></font><?php  echo    $result->PRODESC; ?><br>
                      <font color="maroon"><b> In Stock : </font><?php  echo    $result->PROQTY; ?></b></font><br>
                      <button type="submit" name="btnorder" class="btn btn-primary add-to-cart"> <font color="white"><i class="fa fa-shopping-cart"></i>Buy Now</font></button>
                    </div>
                </div>
              </div>
            </div>
          </form>
       <?php  } ?>
            
          </div><!--features_items--> 
        </div>
      </div>
    </div>
  </section>