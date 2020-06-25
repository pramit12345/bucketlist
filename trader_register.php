<?php

    $active='Account';
    include("includes/db.php");
    include("includes/header.php");

?>



   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->

           </div><!-- col-md-12 Finish -->

           <div class="col-md-3"><!-- col-md-3 Begin -->


           </div><!-- col-md-3 Finish -->

           <div class="col-md-6"><!-- col-md-9 Begin -->

               <div class="box"><!-- box Begin -->

                   <div class="box-header"><!-- box-header Begin -->

                       <center><!-- center Begin -->

                           <h1> Register as a Trader</h1>
                           <br>
                               

                       </center><!-- center Finish -->

                       <form action="trader_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Trader Name</label>

                               <input type="text" class="form-control" name="c_name" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Trader Email</label>

                               <input type="text" class="form-control" name="c_email" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Trader Password</label>

                               <input type="password" class="form-control" name="c_pass" required>

                           </div><!-- form-group Finish -->





                           <div class="form-group"><!-- form-group Begin -->

                               <label>Trader Mobile No.</label>

                               <input type="text" class="form-control" name="c_number" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Trader Address</label>

                               <input type="text" class="form-control" name="c_address" required>

                           </div><!-- form-group Finish -->



                           <div class="form-group"><!-- form-group Begin -->

                               <label>Profile Picture</label>

                               <input type="file" class="form-control form-height-custom" name="c_image" >

                           </div><!-- form-group Finish -->

                   



                           <div class="text-center"><!-- text-center Begin -->

                               <button type="submit" name="register" class="btn btn-primary">

                               <i class="fa fa-user-md"></i> Register
                               <br>
                              
                               </button>
                               <br>
                               <br>
                               <br>
                                <br>
                           </div><!-- text-center Finish -->

                       </form><!-- form Finish -->

                   </div><!-- box-header Finish -->

               </div><!-- box Finish -->

           </div><!-- col-md-9 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>


<?php




if(isset($_POST['register'])){

    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_pass = $_POST['c_pass'];

    $c_number = $_POST['c_number'];

    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    $shop=$_POST['shop'];
   
    move_uploaded_file($c_image_tmp,"trader/trader_images/$c_image");

    $insert_trader = "insert into TRADER(TRADER_NAME,TRADER_EMAIL,TRADER_PASSWORD,TRADER_ADDRESS,TRADER_NUMBER,TRADER_IMAGE) 
                values ('$c_name','$c_email','$c_pass','$c_address','$c_number','$c_image')";

    $run_trader = oci_parse($con,$insert_trader);

        oci_execute($run_trader);



     $_SESSION['TRADER_EMAIL']=$c_email;

     echo "<script>alert('Trader Registered, Please LogIn to Continue')</script>";
         echo "<script>window.open('trader/login.php','_self')</script>";

    



}

?>
