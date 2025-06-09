<?php 
session_start();

require '../classes/selectClassAdmin.php';

$obj = new selectClassesAdmin();


// search function(Not in use bc of datables)
$keyword = isset($_GET['search']) ? $_GET['search'] : '';



// select for populating the update product
$selected = $obj->updateSel();


// get products
$products = $obj->getProducts();

// get sales/orders
$sales = $obj->fetchSales();

// get total sales/orders
$totalSales = $obj->totalSales();


// get the total payent made with transfer
$totaltransfer =$obj->transfer();

//    get the tolata payment made with card
$totalcardPayment =$obj->cardPayment();

// get orders from url
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id']; 
    $sale = $obj->getOrderById($order_id); 
} else {
    return("No order ID specified.");
}



// get multiple order_ids
$total_amount = 0;

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id']; 
    $sales = $obj->getOrderByIds($order_id); 
} else {
    echo "<div class='alert alert-danger'>No order ID specified.</div>";
    $sales = [];
}




?>
