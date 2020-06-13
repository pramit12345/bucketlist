<?php

    session_start();
    include("includes/db.php");
    error_reporting(0);

?>
<html>
    <head>
        <title>Trader Login </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon/123.ico">
    </head>

<link rel="shortcut icon" type="image/x-icon" href="images/favicon/123.ico">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/sty.css">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="logo101.png" href="index.php" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="login.php" class="form-login" method="post">
      <input type="text" id="login" class="fadeIn second" name="admin_email" placeholder="Trader Email" required>
      <input type="text" id="password" class="fadeIn third" name="admin_pass" placeholder="Password" required>
      <input type="submit" class="fadeIn fourth" name="trader_login" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="../trader_register.php">Don't have a account, Click Here</a>
      <a class="underlineHover" href="../index.php">Back to Bucketlist</a>
    </div>

  </div>
</div>
</html>
<?php

    if(isset($_POST['trader_login'])){

        $admin_email = $_POST['admin_email'];

        $admin_pass = $_POST['admin_pass'];

        $get_admin = "select * from trader where TRADER_EMAIL='$admin_email' AND TRADER_PASSWORD='$admin_pass'";

        $run_admin = oci_parse($con,$get_admin);

        oci_execute($run_admin);

       $count = oci_fetch($run_admin);

    //   $get= "SELECT * FROM trader where TRADER_EMAIL='$admin_email' AND TRADER_PASSWORD='$admin_pass' ";
    //   $run=oci_parse($con, $get);
    //   oci_execute($run);
    // while(  $row1= oci_fetch_array($run)){
    //   $role=$row1['STATUST'];
}


        if($count==1 ){

            $_SESSION['admin_email']=$admin_email;

            echo "<script>alert('Welcome Back! You have been logged in.')</script>";

            echo "<script>window.open('index.php?dashboard','_self')</script>";

        }else{

            echo "<script></script>";

        }

    


?>
