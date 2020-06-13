<?php 
    
    $active='Account';
    include("includes/header.php");

?>
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
        <span class="breadcrumb-item active">LogIn</span>
        </nav>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- End Bradcaump area -->


<div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-2"><!-- col-md-12 Begin -->
            </div>

            <div class="col-md-8">         
<div class="registration-form">

  <form action="customer_register.php" method="post" enctype="multipart/form-data">
  
  <hr>
   <div class="form-icon">
    <h1 class="center"> User Log IN </h1>
    <hr>
   </div>
   <div class="form-group">
    <input type="text" class="form-control item" name="c_name" placeholder="Name" required>
   </div>

   <div class="form-group">
    <input type="email" class="form-control item" name="c_email" placeholder="Email" required>
   </div>
   
   <div class="form-group">
    <input type="password" class="form-control item" name="c_pass" placeholder="Password" required>
   </div>
   
   <div class="form-group">
    <input type="text" class="form-control item" name="c_number" placeholder="Phone Number" required>
   </div>
   <div class="form-group">
    <input type="text" class="form-control item" name="c_address" placeholder="Address" required>
   </div>
   <div class="form-group"><!-- form-group Begin -->
    <input type="file" class="form-control form-height-custom" name="c_image" placeholder="Upload Image">
    </div><!-- form-group Finish -->
   <div class="form-group">
    <select class="form-control">
     <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
     <option>What is your Birthdate?</option>
     <option>What is Your old Phone Number</option>
     <option>What is your Pet Name?</option>
    </select>
   </div>
   
   <div class="form-group">
    <button type="Submit" name="register" class="btn btn-primary btn-block">Create Account</button>
   </div>
  
  
  </form>
  
 </div>
</div>
       </div>
 

<!--==================================
	Brand listing
	======================================-->
<!-- Start Brand Area -->
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
   
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    
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

    $c_ip = getRealIpUser();
    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
    $insert_customer = "insert into CUSTOMER(CUSTOMER_NAME,CUSTOMER_EMAIL,
    CUSTOMER_PASSWORD,CUSTOMER_ADDRESS,CUSTOMER_NUMBER,CUSTOMER_IMAGE,CUSTOMER_IP)
     values ('$c_name','$c_email','$c_pass','$c_address','$c_number','$c_image','$c_ip')";
    
    $run_customer = oci_parse($con,$insert_customer);

    oci_execute($run_customer);

    // if($g)
    // {
    // //   $to  = $c_email;
    // //   $subject = "Confirmation";
    // //   $message = 'Thank You 


    // //   <a href="http://localhost/webproject/verify.php?key=$to"></a>
    // //     ';

    // //     $head='from: Team Bucketlist';
    // //     $z=mail($to,$subject,$message,$head);

    //     $sub = "Account Confirmation";
    //     $msg = "Click the link below to register
    //     <a href='http://localhost/webproject/verify.php?key=$to'></a>            
    //     ";
    //     $rec = $c_email;

    //     mail($rec,$sub,$msg);
        
    // }
    
    $sel_cart = "select * from cart where IP_ADD='$c_ip'";
    
    $run_cart = oci_parse($con,$sel_cart);

    oci_execute($run_cart);
    
    $check_cart = oci_fetch($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['CUSTOMER_EMAIL']=$c_email;
        
        
        echo "<script>window.open('shop.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
        
        $_SESSION['CUSTOMER_EMAIL']=$c_email;
        
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

?>