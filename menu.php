
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          </div><!--/category-productsr-->  
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h3 class="title text-center"><font color="black">OUR PRODUCTS</font></h3>
              <?php
             if(isset($_POST['search'])) { 
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 
                AND ( `CATEGORIES` LIKE '%{$_POST['search']}%' OR `PRODESC` LIKE '%{$_POST['search']}%' or `PROQTY` LIKE '%{$_POST['search']}%' or `PROPRICE` LIKE '%{$_POST['search']}%')";
              }elseif(isset($_GET['category'])){
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 AND CATEGORIES='{$_GET['category']}'";
              }else{
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
              }

           
            $mydb->setQuery($query);
            $res = $mydb->executeQuery();
            $maxrow = $mydb->num_rows($res);

            if ($maxrow > 0) { 
            $cur = $mydb->loadResultList();
           
            foreach ($cur as $result) { 

              ?>
            <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
            <div class="col-sm-12">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                    <font color="black"><h3><?php  echo $result->OWNERNAME; ?></h3></font>
                      <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>"  alt="" />
                    <font color="maroon"><h4><b>Ksh </b><?php  echo $result->PRODISPRICE; ?></h4></font>
                    <font color="maroon"><b>Description : </b></font><?php  echo    $result->PRODESC; ?><br>
                    <font color="maroon"><b>In Stock : </b></font><?php  echo    $result->PROQTY; ?><br>
                      <button type="submit" name="btnorder" class="btn btn-primary add-to-cart"><font color="white"><i class="fa fa-shopping-cart"></i>Buy Now</font></button>
                    </div>
                </div>
             
              </div>
            </div>
          </form>
       <?php  } 


            }else{ 

              echo '<h3><span style="color:red;">No Products Available</span></h3>';

            }?> 
          </div><!--features_items-->
        </div>
      </div>
    </div>
  </section>
  