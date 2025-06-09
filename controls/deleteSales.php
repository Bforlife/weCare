<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $order_id = $_POST['order_id'];

    require '../classes/delete.php'; 

    $delete = new delete();
    $result = $delete->deleteSales($order_id);

    echo $result;
}
?>
