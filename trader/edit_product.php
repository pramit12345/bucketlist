<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['edit_product'])){

        $edit_id = $_GET['edit_product'];

        $get_p = "select * from product where PRODUCT_ID='$edit_id'";

        $run_edit = oci_parse($con,$get_p);

        oci_execute($run_edit);

        $row_edit = oci_fetch_array($run_edit);

        $p_id = $row_edit['PRODUCT_ID'];

        $p_title = $row_edit['PRODUCT_TITLE'];



        $p_image1 = $row_edit['PRODUCT_IMG1'];

        $p_price = $row_edit['PRODUCT_PRICE'];



        $p_desc = $row_edit['PRODUCT_DESC'];
        $p_allg = $row_edit['PRODUCT_ALLG'];

        $p_quan = $row_edit['PRODUCT_QUANTITY'];

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <ol class="breadcrumb"><!-- breadcrumb Begin -->

            <li class="active"><!-- active Begin -->

                <i class="fa fa-dashboard"></i> Dashboard / Edit Products

            </li><!-- active Finish -->

        </ol><!-- breadcrumb Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel-heading Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-money fa-fw"></i> Update Product

               </h3><!-- panel-title Finish -->

           </div> <!-- panel-heading Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Title </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Price </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product quantity </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_quantity" type="text" class="form-control" required value="<?php echo $p_quan; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->



                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Desc </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="product_desc" cols="19" rows="6" class="form-control">

                              <?php echo $p_desc; ?>

                          </textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Product Allergy </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="product_allg" cols="19" rows="6" class="form-control">

                              <?php echo $p_allg; ?>

                          </textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

               </form><!-- form-horizontal Finish -->

           </div><!-- panel-body Finish -->

        </div><!-- canel panel-default Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php

if(isset($_POST['update'])){

    $product_title = $_POST['product_title'];

    $product_price = $_POST['product_price'];

    $product_quantity = $_POST['product_quantity'];

    $product_desc = $_POST['product_desc'];
   
    $product_allg = $_POST['product_allg'];




   

    $update_product = "update product set PRODUCT_DATE=sysdate,PRODUCT_TITLE='$product_title',PRODUCT_DESC='$product_desc',PRODUCT_ALLG='$product_allg',PRODUCT_PRICE='$product_price',PRODUCT_QUANTITY='$product_quantity' where PRODUCT_ID='$p_id'";

    $run_product = oci_parse($con,$update_product);

    oci_execute($run_product);

    if($run_product){

       echo "<script>alert('Your product has been updated.')</script>";

       echo "<script>window.open('index.php?view_products','_self')</script>";

    }

}

?>


<?php } ?>
