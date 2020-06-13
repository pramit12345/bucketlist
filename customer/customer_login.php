


<body>
    


<!-- Body main wrapper start -->
<div class="wrapper">


	
<div class="login-dark">
	 
     <form method="post" action="checkout.php">
         <h2 class="sr-only">Login Form</h2>
         <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
         <div class="form-group"><input class="form-control" type="email" name="c_email" placeholder="Email" required></div>
         <div class="form-group"><input class="form-control" type="password" name="c_pass" placeholder="Password" required></div>
         <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login">Log In</button></div>
         <a href="customer_register.php" class="forgot">Don't have a Account Click here to register</a></form>
 </div>
</div>



</body>
</html>


<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customer where CUSTOMER_EMAIL='$customer_email' AND CUSTOMER_PASSWORD='$customer_pass'";
    
    $run_customer = oci_parse($con,$select_customer);

    oci_execute($run_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = oci_fetch($run_customer);
    
    $select_cart = "select * from cart where IP_ADD='$get_ip'";
    
    $run_cart = oci_parse($con,$select_cart);

    oci_execute($run_cart);
    
    $check_cart = oci_fetch($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is incorrect.')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['CUSTOMER_EMAIL']=$customer_email;
        
       echo "<script>alert('You have been logged in.')</script>";
        
       echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }else{
        
        $_SESSION['CUSTOMER_EMAIL']=$customer_email;
        
       echo "<script>alert('You have been logged in.')</script>";
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>