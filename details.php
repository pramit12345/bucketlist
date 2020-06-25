<?php

    $active='Cart';
    include("includes/db.php");
     error_reporting(0);

?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Bucket List | Product Details</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Place favicon.ico in the root directory -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="apple-touch-icon.png">

<!-- All css files are included here. -->
<!-- Bootstrap fremwork main css -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Owl Carousel min css -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<!-- This core.css file contents all plugings css file. -->
<link rel="stylesheet" href="css/core.css">
<!-- Theme shortcodes/elements style -->
<link rel="stylesheet" href="css/shortcode/shortcodes.css">
<!-- Theme main style -->
<link rel="stylesheet" href="style.css">
<!-- Responsive css -->
<link rel="stylesheet" href="css/responsive.css">
<!-- User style -->
<link rel="stylesheet" href="css/custom.css">

<!-- Modernizr JS -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>

</head>

<?php
include("includes/header.php");

?>

<body>
<div class="wrapper">                 
   <!-- Start Product Details Area -->
 <section class="htc__product__details bg__white ptb--100">
  <!-- Start Product Details Top -->
  <div class="htc__product__details__top">
   <div class="container">
    <div class="row">
     <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
      <div class="htc__product__details__tab__content">
       <!-- Start Product Big Images -->
       <div class="product__big__images">
        <div class="portfolio-full-image tab-content">
         <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
          <img  src="Trader/product_images/<?php echo $pro_img1; ?>" alt="full-image">
         </div>
        </div>
       </div>
       <!-- End Product Big Images -->
       
      </div>
     </div>
     <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
      <div class="ht__product__dtl">
       <h2><?php echo$pro_title; ?> </h2>

       <ul  class="pro__prize">
        <li>$<?php echo $pro_price; ?> </li>
       </ul>
       <div class="ht__pro__desc">
        <div class="sin__desc">
         <p><span>Availability:</span> In Stock</p>
        </div>
        <div class="sin__desc align--left">
         <p><span>Categories:</span></p>
         <ul class="pro__cat__list">
          <li>
          <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
          </li>
         </ul>
        </div>

        <?php add_cart(); ?>

<form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
    <div class="form-group"><!-- form-group Begin -->
        <label for="" class="col-xs-12 control-label">Select Product Quantity</label><br><br>

        <select name="product_qty" id="" class="form-control col-xs-10"><!-- select Begin -->
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         <option>6</option>
         <option>7</option>
         <option>8</option>
         <option>9</option>
         <option>10</option>
         <option>11</option>
         <option>12</option>
         <option>13</option>
         <option>14</option>
         <option>15</option>
         <option>16</option>
         <option>17</option>
         <option>18</option>
         <option>19</option>
         <option>20</option>
         </select><!-- select Finish -->


    </div><!-- form-group Finish -->

    <p class="text-right checkout-buttons" ><button class="btn btn-sceondary i fa fa-shopping-cart" > Add to cart</button></p>
    
</form>

<div class="ht__pro__desc">
        <div class="sin__desc">
         <p><span>Description : </span><?php echo $pro_desc; ?></p>
        </div>
        <div class="ht__pro__desc">
        <div class="sin__desc">
         <p><span>Allergy Info : </span> <?php echo $pro_allg; ?></p>
        </div>  

       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- End Product Details Top -->
 </section>
 <!-- End Product Details Area -->
 <!-- Start Product Description -->
 <section class="htc__produc__decription bg__white">
  <div class="container">
   <div class="row">
    <div class="col-xs-10">

    </div>
      </div>
      <!-- End Single Content -->

      
      <div class="stars" >
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style> 
div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
</div>

<form action="" method="post">     
       <ul class="review">
       <input class="star star-5" id="star-5" type="radio" name="r"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="r"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="r"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="r"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="r"/>
    <label class="star star-1" for="star-1"></label>

       <textarea class="form-control" rows="2" placeholder="Write your review here..." name="name" id="remark" required></textarea><br> 
       <p class="text-right checkout-buttons" ><button class="btn btn-sceondary icon-note" type="submit" value="review"
        name="add"> Submit Review</button></p>
    </ul>
</form>
<?php

if(isset($_POST['add'])){
   
    $review_desc = $_POST['name'];
    $review_rate = $_POST['r'];
    
    $select_review = "insert into REVIEW (REVIEW_DESC,PRODUCT_ID,RATING) values('$review_desc','$product_id','$review_rate')";
    
    $run_review = oci_parse($con,$select_review);

    oci_execute($run_review);

}
?>
<br>
<hr>
      
     </div>
    </div>
   </div>
  </div>
 </section>
 <!-- End Product Description -->
 <!-- Start Product Area -->
 
 <!-- Start Banner Area -->
 <div class="htc__brand__area bg__cat--4">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
     <div class="ht__brand__inner">
      <ul class="brand__list owl-carousel clearfix">
       <li>
        <a href="#">
         <img src="images/brand/1.png" alt="brand images">
        </a>
       </li>
       <li>
        <a href="#">
         <img src="images/brand/2.png" alt="brand images">
        </a>
       </li>
       <li>
        <a href="#">
         <img src="images/brand/3.png" alt="brand images">
        </a>
       </li>
       <li>
        <a href="#">
         <img src="images/brand/4.png" alt="brand images">
        </a>
       </li>
       <li>
        <a href="#">
         <img src="images/brand/5.png" alt="brand images">
        </a>
       </li>
       <li>
        <a href="#">
         <img src="images/brand/5.png" alt="brand images">
        </a>
       </li>
       <li>
        <a href="#">
         <img src="images/brand/1.png" alt="brand images">
        </a>
       </li>
       <li>
        <a href="#">
         <img src="images/brand/2.png" alt="brand images">
        </a>
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- End Banner Area -->
 <!-- End Banner Area -->

</div>  
<!-- wrapper class    -->

   <?php

    include("includes/footer.php");

    ?>    
</body>
</html>





