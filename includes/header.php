<?php
    session_start();

    include("includes/db.php");
    include("functions/functions.php");

    ?>
    
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Bucket List</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--==================================
	Favicon
	======================================-->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon/123.ico">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<!--==================================
	All css files are included here
	======================================-->

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
<!--Footer css-->
<link rel="stylesheet" href="fstyle.css">
<!--Header css-->
<link href="hstyle.css" rel="stylesheet" />
</head>

<body>
<header id="htc__header" class="htc__header__area header--one">
 <!-- Start Mainmenu Area -->
 <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
  <div class="container">
   <div class="row">
    <div class="menumenu__container clearfix">
     <div class="col-lg-2 col-md-4 col-sm-3 col-xs-5">
      <div class="logo">
       <a href="index.php">
        <img src="images/logo/logo101.png" alt="logo images">
       </a>
      </div>
     </div>
     <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
      <nav class="main__menu__nav hidden-xs hidden-sm">
       <ul class="main__menu">
       
        <li class="drop">
         <a href="shop.php">
          Shop
         </a>
        </li>
        
        <li class="drop">
         <a href="cart.php">
          Cart
         </a>
        </li>
       

        <li class="<?php if($active=='Account')echo"active"; ?>">

        <?php 

        if(!isset($_SESSION['CUSTOMER_EMAIL']))
        {
        echo"<a href='checkout.php'>Account</a>";

        }
        else
        {
        echo"<a href='customer/my_account.php?my_orders'>Account</a>";
        }

        ?>

        </li>

        <li class="drop">
         <a href="about.php">
          About
         </a>
        </li>

        <li>
         <a>
                 <?php

                   if(!isset($_SESSION['CUSTOMER_EMAIL'])){

                       echo "Welcome: GUEST";

                   }else{

                       echo "Welcome: " .$_SESSION['CUSTOMER_EMAIL']."";

                   }

                   ?>
               </a>
         </li>

       </ul>
      </nav>
      <div class="mobile-menu clearfix visible-xs visible-sm">
       <nav id="mobile_dropdown">
        <ul>
         <li>
          <a href="index.php">
           Home
          </a>
         </li>
         <li>
          <a href="shop.php">
           Shop
          </a>
         </li>

         <li class="<?php if($active=='Account')echo"active"; ?>">

        <?php 

        if(!isset($_SESSION['CUSTOMER_EMAIL']))
        {
        echo"<a href='checkout.php'>My Account</a>";

        }
        else
        {
        echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
        }

        ?>

        </li>

        <li>
          <a href="about.php">
           About Us
          </a>
         </li>

         <li>
         <a>
        <?php

        if(!isset($_SESSION['CUSTOMER_EMAIL'])){

            echo "Welcome: GUEST";

        }else{

            echo "Welcome: " .$_SESSION['CUSTOMER_EMAIL']."";

        }

        ?>
        </a>
         </li>

        </ul>
       </nav>
      </div>
     </div>
     <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
      <div class="header__right">
       <div class="header__search search search__open">
        <a href="#">
         <i class="icon-magnifier icons"></i>
        </a>
       </div>
       <a href="checkout.php"> 

        <?php

        if(!isset($_SESSION['CUSTOMER_EMAIL'])){

        echo "<a href='checkout.php'>User &nbsp  </a> ";
        echo "<a href='Trader/login.php'> |&nbsp Trader</a>";

        }else{

        echo "<a href='logout.php'> Log Out </a>";
            }
        ?>

        </a>       

     </div>
    </div>
   </div>
   <div class="mobile-menu-area"></div>
  </div>
 </div>
 <!-- End Mainmenu Area -->
</header>
<!-- End Header Area -->

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
<!-- Start Search Popap -->
<div class="search__area">
 <div class="container" >
  <div class="row" >
   <div class="col-md-12" >
    <div class="search__inner">
     <form action="search.php" method="GET">
      <input type="text" placeholder="Search here... " name="query">
      <button name= "search "type="submit" ></button>
     </form>
    
     <div class="search__close__btn">
      <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<!-- End Search Popap -->
        </div>
        

<?php

if(isset($_GET['pro_id'])){

    $product_id = $_GET['pro_id'];

    $get_product = "select * from product where PRODUCT_ID='$product_id'";

    $run_product = oci_parse($con,$get_product);

    oci_execute($run_product);

    $row_product = oci_fetch_array($run_product);

    $p_cat_id = $row_product['CATEGORY_ID'];

    $pro_title = $row_product['PRODUCT_TITLE'];

    $p="abc";

    $pro_price = $row_product['PRODUCT_PRICE'];

    $pro_desc = $row_product['PRODUCT_DESC'];

    $pro_img1 = $row_product['PRODUCT_IMG1'];

    $pro_allg = $row_product['PRODUCT_ALLG'];

    $get_p_cat = "select * from categories where CATEGORY_ID='$p_cat_id'";

    $run_p_cat = oci_parse($con,$get_p_cat);

    oci_execute($run_p_cat);

    $row_p_cat = oci_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['CATEGORY_NAME'];

}

?>
              