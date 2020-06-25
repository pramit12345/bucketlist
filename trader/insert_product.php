<?php

  if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
include("includes/db.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">

</head>
<body>

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <ol class="breadcrumb"><!-- breadcrumb Begin -->

            <li class="active"><!-- active Begin -->

                <i class="fa fa-dashboard"></i> Dashboard / Insert Products

            </li><!-- active Finish -->

        </ol><!-- breadcrumb Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel-heading Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-money fa-fw"></i> Insert Product

               </h3><!-- panel-title Finish -->

           </div> <!-- panel-heading Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Title </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_title" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

            <!-- form-group Finish -->




                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Image 1 </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_img1" type="file" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                 

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Price </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_price" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                     <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Quantity </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_quan" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->
                     </div>




                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Description </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Allergy </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="product_allg" cols="19" rows="6" class="form-control"></textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group">
                    <label class="col-md-3 control-label" for="product_categorie">Product Category</label>
                    <div class="col-md-6">
                    <select name = "product_cat" class="form-control">
                    <option>Select a category</option>
                    
                    <?php
                    $get_p_cats = "select * from CATEGORIES";
                    $run_p_cats = oci_parse($con,$get_p_cats);
                    oci_execute($run_p_cats);

                    while($row=oci_fetch_array($run_p_cats))
                    {
                    $id = $row['CATEGORY_ID'];
                    $cat_title = $row ['CATEGORY_NAME'];

                    echo "<option value ='$id'> $cat_title </option>";
                    }
                    ?>
                    </select>
                    
                </div>
                </div> 

                
                   

                   <div class="form-group">
                    <label class="col-md-3 control-label" for="product_categorie">Product Shop</label>
                    <div class="col-md-6">
                    <select name = "product_shop" class="form-control">
                    <option>Select a shop type</option>
                    
                    <?php
                    $get_p_cats = "select * from SHOP";
                    $run_p_cats = oci_parse($con,$get_p_cats);
                    oci_execute($run_p_cats);

                    while($row=oci_fetch_array($run_p_cats))
                    {
                    $id = $row['SHOP_ID'];
                    $shop_title = $row ['SHOP_NAME'];

                    echo "<option value ='$id'> $shop_title </option>";
                    }
                    ?>
                    </select>
                    
                </div>
                </div> 




                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

               </form><!-- form-horizontal Finish -->

           </div><!-- panel-body Finish -->

        </div><!-- canel panel-default Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>


<?php

if(isset($_POST['submit'])){

    $product_title = $_POST['product_title'];


          $product_price = $_POST['product_price'];
            $product_desc = $_POST['product_desc'];
            $product_allg = $_POST['product_allg'];
            $product_quan = $_POST['product_quan'];
           
            $c_id = $_POST['product_cat'];
            $s_id = $_POST['product_shop'];


    $product_img1 = $_FILES['product_img1']['name'];
   
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
   

    move_uploaded_file($temp_name1,"product_images/$product_img1");
   

      $trader_session = $_SESSION['admin_email'];
      $e = "select * from trader where TRADER_EMAIL='$trader_session'";
      $tf = oci_parse($con,$e);
      oci_execute($tf);
      $rh = oci_fetch_array($tf);
      $t_id = $rh['ID'];
      
      
    $insert_product = "insert into PRODUCT (PRODUCT_TITLE,PRODUCT_DATE,PRODUCT_IMG1,
                    PRODUCT_PRICE,PRODUCT_DESC,PRODUCT_ALLG,PRODUCT_QUANTITY,TRADER_ID,CATEGORY_ID,SHOP_ID) 
    values ('$product_title',sysdate,'$product_img1','$product_price','$product_desc',
    '$product_allg','$product_quan','$t_id','$c_id','$s_id')";



    $run_product = oci_parse($con,$insert_product);
    oci_execute($run_product);
    if($run_product){

        echo "<script>alert('Product has been inserted successfully.')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";

    }

}


?>


<?php  ?>
