<?php

    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

        $admin_session = $_SESSION['admin_email'];

        $get_admin = "select * from trader where TRADER_EMAIL='$admin_session'";

        $run_admin = oci_parse($con,$get_admin);

        oci_execute($run_admin);

        $row_admin = oci_fetch_array($run_admin);

        $admin_id = $row_admin['TRADER_ID'];

        $admin_name = $row_admin['TRADER_NAME'];

        $admin_email = $row_admin['TRADER_EMAIL'];

        $admin_image = $row_admin['TRADER_IMAGE'];

        $admin_country = $row_admin['TRADER_ADDRESS'];

        $admin_about = $row_admin['TRADER_NUMBER'];

                // $admin_contact = $row_admin['CATEGORY_ID'];



                // $get_products = "select * from product where CATEGORY_ID=$admin_contact";

                // $run_products = oci_parse($con,$get_products);

                // oci_execute($run_products);

                // $count_products = oci_fetch($run_products);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Bucket List Trader Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
    

       <?php include("includes/sidebar.php"); ?>

        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->

                <?php

                       if(isset($_GET['insert_product'])){

                        include("insert_product.php");

                }   if(isset($_GET['view_products'])){

                        include("view_products.php");

                }   if(isset($_GET['delete_product'])){

                        include("delete_product.php");

                }   if(isset($_GET['edit_product'])){

                        include("edit_product.php");


                }   if(isset($_GET['insert_user'])){

                        include("insert_user.php");

                }   if(isset($_GET['user_profile'])){

                        include("user_profile.php");

                }

                ?>

            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>


<?php } ?>
