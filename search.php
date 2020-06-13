<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include('includes/db.php');
include('includes/header.php');

  
?>
<html>
<body>
        


<div class="wrapper">
    
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/1234.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
        <div class="container">
        <div class="row">
        <div class="col-xs-12">
        <div class="bradcaump__inner">
        <nav class="bradcaump-inner">
        <a class="breadcrumb-item" href="index.php">Home</a>
        <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
        <a class="breadcrumb-item active" href="shop.php">Products</a>
        </nav>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
        <div class="container">
        <div class="row">
        <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
        <div class="htc__product__rightidebar">
        <div class="htc__grid__top">
        <div class="htc__select__option">

        </div>

        <!-- Start List And Grid View -->
        <ul class="view__mode" role="tablist">
        <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>

        </ul>
        <!-- End List And Grid View -->
        </div>
        <!-- Start Product View -->
        

        <div class="row">
        <div class="shop__grid__view__wrap">
        <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">

        <?php

        if(isset($_GET['query']))
        {
          $keywords = $_GET['query'];
        $get_products = " select *  from PRODUCT where PRODUCT_IMG1 like '%$keywords%' ";
        $run_products=oci_parse($con,$get_products);
        oci_execute($run_products);
        while($row_products=oci_fetch_array($run_products))

        {
            $pro_id = $row_products['PRODUCT_ID'];

            $pro_title = $row_products['PRODUCT_TITLE'];

            $pro_price = $row_products['PRODUCT_PRICE'];

            $pro_img1 = $row_products['PRODUCT_IMG1'];

            $pro_allg = $row_products['PRODUCT_ALLG'];

            echo "

            <div class='col-md-4 col-lg-4 col-sm-6 col-xs-12'>
                      <div class='category'>
                      <div class='ht__cat__thumb'>
                      <a href='details.php?pro_id=$pro_id'>

                                  <img class='img-responsive' src='Trader/product_images/$pro_img1'>

                              </a>
                      </div>
                      <div class='fr__hover__info'>
                      <ul class='product__action'>
                        

                          <li><a href='details.php?pro_id=$pro_id'><i class='icon-basket icon'></i></a></li>

                      </ul>
                      </div>
                      <div class='fr__product__inner'>
                      <h4><a href='details.php?pro_id=$pro_id'> $pro_title </a></h4>
                      <ul class='fr__pro__prize'>
                          <li> $$pro_price</li>
                      </ul>
                      </div>
                      </div>
                      </div>

                  ";

        }
        }

      ?>
              
        <?php
                   getcatpro();

                 ?>
              
     
        
        <!-- End Single Product -->
        </div>
            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
            <div class="col-xs-12">
            <div class="ht__list__wrap">
            <!-- Start List Product -->
            
            
           
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- End Product View -->
        </div>
       
        </div>
        <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
        <div class="htc__product__leftsidebar">

                            <!-- End Prize Range -->
                            <!-- Start Category Area -->
                            <div class="htc__category">
                                <h4 class="title__line--4">categories</h4>
                                <?php getPCats();?>
                            </div>
                            <!-- End Category Area -->

                            <div class="htc__category">
                                <h4 class="title__line--4">Shop</h4>
                                    <ul class="ht__cat__list">
                                    <?php getshop();?>

                                    </ul>
                            </div>
                 
                         
                            
                          
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        


</div><!-- container Finish -->
       </div><!-- #content finish -->
       <!-- Start Brand Area -->
       <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->




</div> <!-- Body main wrapper end -->
       <?php

       include("includes/footer.php");
       ?>

</body>
</html>

