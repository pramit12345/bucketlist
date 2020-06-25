<?php

if(isset($_POST['add'])){
   
    $review_desc = $_POST['REVIEW_DESC'];
    
    $select_review = "insert into REVIEW (REVIEW_DESC) values('$review_desc')";
    
    $run_review = oci_parse($con,$select_review);

    oci_execute($run_review);



    





}




?>