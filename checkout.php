<?php

    $active='Account';
    include("includes/header.php");

?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-2"><!-- col-md-12 Begin -->

           <!-- col-md-12 Finish -->
           </div>
         
          <div class="col-md-12"> <!--col-md-9 start-->

          <?php

           if(!isset($_SESSION['CUSTOMER_EMAIL'])){

               include("customer/customer_login.php");

           }else{

               include("payment_options.php");

           }

           ?>
         </div><!--col-md-9 start-->
       </div><!-- container Finish -->
   </div><!-- #content Finish -->


     </div>




   </div>




   <?php

    include("includes/footer.php");

    ?>

</body>
</html>
