<?php
session_start();
require '../classes/productUploadClass.php';

$sales = new insert();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_SESSION['cart']) || !isset($_SESSION['customer_details'])) {
        echo "Missing cart or customer details.";
        return;
    }

    foreach ($_SESSION['cart'] as $item_id => $item) {
        $prdt_id = $item['id'];
        $prdt_code = $item_id;              
        $prdt_name = $item['name'];             
        $price = $item['price'];
        $qty = $item['qty'];
        $color = $item['color'];         
        $size = $item['size'];          
        $total = $price * $qty;

        $cust = $_SESSION['customer_details'];

        $customer_name = $cust['name'];
        $phone = $cust['phone'];
        $email = $cust['email'];
        $shipping_address = $cust['service_address'];
        $order_id = $cust['order_id'];
        $order_date = date("Y-m-d H:i:s");
        $order_note = $cust['order_note'];
        $pay_option = $cust['pay_option'];
        $delivery_date = date("Y-m-d H:i:s");


        $result = $sales->sales(
            $prdt_id, $prdt_code, $prdt_name, $price, $qty,
            $color, $size, $total, $customer_name, $phone, 
            $email, 
            $shipping_address,
            $order_id, $order_date, $order_note, $pay_option,
            $delivery_date
        );

        if (!$result) {
            echo "Error inserting item: $prdt_name<br>";
        }
    }

    // unset($_SESSION['cart']);
    // unset($_SESSION['customer_details']);

 
    header("Location:../user/thankYouPage.php");
   
return;




}
?>

