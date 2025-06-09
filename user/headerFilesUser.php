<?php

session_start();



if (!isset($_SESSION['id'])) {
header("location:../login.php");
} else {
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
// $phone = $_SESSION['phone'];




require '../classes/selectClassUser.php';
$order_id = $_GET['order_id'] ?? null;
$prdt_id = $_GET['prdt_id'] ?? null;

$obj = new selectClassesUser();


$products = $obj->getProducts();


$orders = $obj->getUserOrders($_SESSION['email']);

// get the prdt_id from the url
if (isset($_GET['prdt_id'])) {
    $prdt_id = $_GET['prdt_id'];
} else {
    echo "No product selected.";
}

// Fetch the specific order info
$order = $obj->getOrderById($order_id);
// print_r($order);





// if (isset($_GET['order_id'])) {
//     $order_id = $_GET['order_id'];
//     $order = $obj->getOrderById($order_id);
//     if (!$order) {
//         echo "<div class='alert alert-danger'>Order not found.</div>";
       
//     }
// } else {
//     echo "<div class='alert alert-warning'>No Order ID provided.</div>";
//     return;
// }

}

?>