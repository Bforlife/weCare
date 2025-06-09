<?php 

session_start();
    
// all headerFiles are not rendering well

require 'classes/selectProducts.php';
$obj = new selectClasses();


$products = $obj->getProducts();




// fetch reviews
$allReviews = $obj->getAllReviews();
// print_r($allReviews);
  
// $stmt = $obj->getReviewsByProductCode($prdt_id);
// print_r($stmt);







?>