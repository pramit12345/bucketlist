<?php
include("includes/db.php");

?>

<?php

if (isset($_GET['token'])) {
    # code...
		$token =  $_GET['token'];
		$updatequery = "update customer set STATUS='ACTIVE' where token='$token'";

		$update = oci_parse($con,$updatequery);

			oci_execute($update);
			
			if($update)
			{
				echo "<script>window.open('checkout.php','_self')</script>";
			}
}
?>
