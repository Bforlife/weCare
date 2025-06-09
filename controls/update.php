<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    require '../classes/update.php';
    
    $update = new update();
    $updateQuantity = $update->updateQuantity($id, $quantity);
    echo $updateQuantity;

 
}



?>