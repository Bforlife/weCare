<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['customer_details'] = array(
        'name' => $_POST['name'], 
        'phone' => $_POST['phone'], 
        'email' => $_POST['email'], 
        'service_address' => $_POST['service_address'],
        'order_note' => $_POST['order_note'], 
        'order_date' => $_POST['order_date'],  
        'order_id' => 'ORD' . strtoupper(uniqid()),  
        'delivery_date' => 'pending', 
        'pay_option' => $_POST['pay_option'],
        'payment_status' => 'pending'
      
    );

    echo "Customer details saved.";


header("Location: option.php");
} else {
    echo "Invalid request method.";
}

?>
