<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    


    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $delivery_date = $_POST['delivery_date'];

    require '../classes/update.php';

    $update = new update();
    $updateSales = $update->updateSales($order_id, $delivery_date, $payment_status);

    echo $updateSales; 

}

?>