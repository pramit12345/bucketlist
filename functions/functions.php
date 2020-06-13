    <?php

$db = oci_connect('pramit', 'opassword', '//localhost/xe');


/// begin getRealIpUser functions ///

function getRealIpUser(){

    switch(true){

            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

            default : return $_SERVER['REMOTE_ADDR'];

    }

}

/// finish getRealIpUser functions ///

/// begin add_cart functions ///


function add_cart(){

    global $db;

    if(isset($_GET['add_cart'])){

        $ip_add = getRealIpUser();

        $p_id = $_GET['add_cart'];

        $product_qty = $_POST['product_qty'];



        $check_product = "select * from cart where CART_ID='$p_id' and IP_ADD='$ip_add";

        $run_check = oci_parse($db,$check_product);

        oci_execute($run_check);




        if(oci_fetch($run_check)>0){

            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }else{

            $query = "insert into cart (CART_ID,CART_QUANTITY,IP_ADD) values ('$p_id','$product_qty','$ip_add')";

            $run_query = oci_parse($db,$query);

            oci_execute($run_query);

            echo "<script>window.open('shop.php','_self')</script>";

        }

    }

}
/// finish add_cart functions ///

/// begin getPro functions ///

function getPro(){

    global $db;

    $get_products = "select * from product where rownum <=8 order by 1 DESC";

    $run_products = oci_parse($db,$get_products);
     oci_execute($run_products);

    while($row_products=oci_fetch_array($run_products)){

        $pro_id = $row_products['PRODUCT_ID'];

        $pro_title = $row_products['PRODUCT_TITLE'];

        $pro_price = $row_products['PRODUCT_PRICE'];

        $pro_img1 = $row_products['PRODUCT_IMG1'];

        $pro_allg =$row_products['PRODUCT_ALLG'];

        echo "

        <div class='col-md-4 col-sm-6 single'>

            <div class='product'>

                <a href='details.php?pro_id=$pro_id'>

                    <img class='img-responsive' src='Trader/product_images/$pro_img1'>

                </a>

                <div class='text'>

                    <h3>

                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>

                    </h3>

                    <p class='price'>

                        $ $pro_price

                    </p>

                    <p class='button'>

                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>

                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>

                    </p>

                </div>

            </div>

        </div>

        ";

    }

}

/// finish getPro functions ///

/// begin getPCats functions ///

function getPCats(){

    global $db;

    $get_p_cats = "select * from categories";

    $run_p_cats = oci_parse($db,$get_p_cats);
    oci_execute($run_p_cats);

    while($row_p_cats=oci_fetch_array($run_p_cats)){

        $p_cat_id = $row_p_cats['CATEGORY_ID'];

        $p_cat_title = $row_p_cats['CATEGORY_NAME'];

        echo "

            <li>

                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>

            </li>

        ";

    }

}


function getPCatsd(){

    global $db;

    $get_p_cats = "select * from categories";

    $run_p_cats = oci_parse($db,$get_p_cats);
    oci_execute($run_p_cats);

    while($row_p_cats=oci_fetch_array($run_p_cats)){

        echo "<option value='{$row_p_cats['CATEGORY_ID']}'>{$row_p_cats['CATEGORY_NAME']}";

    }

}

/// finish getPCats functions ///


/// begin getcatpro functions ///*/

function getcatpro(){

    global $db;

    if(isset($_GET['p_cat'])){

        $cat_id = $_GET['p_cat'];

        $get_cat = "select * from categories where CATEGORY_ID='$cat_id'";

        $run_cat = oci_parse($db,$get_cat);

        oci_execute($run_cat);

        $row_cat = oci_fetch_array($run_cat);

        $cat_title = $row_cat['CATEGORY_NAME'];

        



        $get_cat = "select * from product where CATEGORY_ID='$cat_id' ";

        $run_products = oci_parse($db,$get_cat);

        oci_execute($run_products);






        while($row_products=oci_fetch_array($run_products)){

            $pro_id = $row_products['PRODUCT_ID'];

            $pro_title = $row_products['PRODUCT_TITLE'];

            $pro_price = $row_products['PRODUCT_PRICE'];

            $pro_desc = $row_products['PRODUCT_DESC'];

            $pro_img1 = $row_products['PRODUCT_IMG1'];

            $pro_allg =$row_products['PRODUCT_ALLG'];

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
               

                <li><a href='details.php?pro_id=$pro_id'><i class='icon-basket icons'></i></a></li>

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
}

/// finish getcatpro functions ///


function getshop()
{
     global $db;

    $get_p_shop = "select * from SHOP";
    $run_p_shop = oci_parse($db,$get_p_shop);
    oci_execute($run_p_shop);

    while($row=oci_fetch_array($run_p_shop))
    {
    $id = $row['SHOP_ID'];
    $shop_title = $row ['SHOP_NAME'];
    echo "

    <li>

        <a href='shop.php?p_shop=$id'> $shop_title </a>

    </li>

";
    }
}


function getshoppro(){

    global $db;

    if(isset($_GET['p_shop'])){

        $shop_id = $_GET['p_shop'];

        $get_shop = "select * from SHOP where SHOP_ID='$shop_id'";

        $run_cat = oci_parse($db,$get_shop);

        oci_execute($run_cat);

        $row_shop = oci_fetch_array($run_cat);

        $shop_title = $row_shop['SHOP_NAME'];

        



        $get_shop = "select * from product where SHOP_ID='$shop_id' ";

        $run_products = oci_parse($db,$get_shop);

        oci_execute($run_products);


        while($row_products=oci_fetch_array($run_products)){

            $pro_id = $row_products['PRODUCT_ID'];

            $pro_title = $row_products['PRODUCT_TITLE'];

            $pro_price = $row_products['PRODUCT_PRICE'];

            $pro_desc = $row_products['PRODUCT_DESC'];

            $pro_img1 = $row_products['PRODUCT_IMG1'];

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
               

                <li><a href='details.php?pro_id=$pro_id'><i class='icon-handbag icons'></i></a></li>

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
}

/// finish getshoppro functions ///

/// finish getRealIpUser functions ///

function items(){

    global $db;

    $ip_add = getRealIpUser();

    $get_items = "select * from cart where IP_ADD='$ip_add'";

    $run_items = oci_parse($db,$get_items);

    oci_execute($run_items);

    $li = oci_parse($db, "SELECT count(*) FROM CART");
                        oci_execute($li);
                        $row=oci_fetch_array($li);
                        $count=$row[0];

                          echo $count;

}

/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price(){

    global $db;

    $ip_add = getRealIpUser();

    $total = 0;

    $select_cart = "select * from cart where IP_ADD='$ip_add'";

    $run_cart = oci_parse($db,$select_cart);

    oci_execute($run_cart);

    while($record=oci_fetch_array($run_cart)){

        $pro_id = $record['CART_ID'];

        $pro_qty = $record['CART_QUANTITY'];

        $get_price = "select * from product where PRODUCT_ID='$pro_id'";

        $run_price = oci_parse($db,$get_price);

        oci_execute($run_price);

        while($row_price=oci_fetch_array($run_price)){

            $sub_total = $row_price['PRODUCT_PRICE']*$pro_qty;

            $total += $sub_total;

        }

    }

    echo "$" . $total;

}

/// finish total_price functions ///

?>
