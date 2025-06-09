<?php
require '../classes/productUploadClass.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



$obj = new insert();

    $order_id = $_POST['order_id'];
    $prdt_id = $_POST['prdt_id'];
    $email = $_POST['email'];
    $customer_name = $_POST['customer_name'];
    $review_msg = $_POST['review_msg'];
    $star = $_POST['review_star'];
    $date = date("Y-m-d");

     $result = $obj->insertReviews($customer_name, $email, $star, $review_msg, 
     $order_id, $prdt_id);

   
if ($result === true) {
    echo "Review submitted successfully!";
} else {
    echo $result; 
}

     



}
    



?>