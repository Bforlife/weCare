<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['productCode'];
    $name = $_POST['productName'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $closingStock = (int) $_POST['closingStock'];
    $openingStock = $_POST['openingStock'];
    $sellingPrice = $_POST['sellingPrice'];
    $costPrice = $_POST['costPrice'];
    $description = $_POST['description'];

    if (array_key_exists($item_id, $_SESSION['cart'])) {
        $currentQty = $_SESSION['cart'][$item_id]['qty'];

        if ($currentQty < $closingStock) {
            $_SESSION['cart'][$item_id]['qty'] += 1;
            echo "success";
        } else {
            echo "You cannot add more than $closingStock item(s) in stock.";
        }
    } else {
        if ($closingStock >= 1) {
            $_SESSION['cart'][$item_id] = array(
                "id" => $id,
                "name" => $name,
                "price" => $price,
                "qty" => 1,
                "size" => $size,
                "color" => $color,
                "closingStock" => $closingStock,
                "openingStock" => $openingStock,
                "sellingPrice" => $sellingPrice,
                "costPrice" => $costPrice,
                "description" => $description
            );
            echo "success";
        } else {
            echo "Item is out of stock.";
        }
    }

} 



// Function to remove cart items
// if (isset($_POST['remove_item'])) {
//     $removeItem = $_POST['id'];
//     unset($_SESSION['cart'][$removeItem]);
//     echo "item Removed";
// }

if (isset($_POST['action_type']) && $_POST['action_type'] == 'remove') {
    $removeItem = $_POST['id'];
    unset($_SESSION['cart'][$removeItem]);
    echo "item Removed";
}


// Function to update cart items
// if (isset($_POST['update_item'])) {
//     $updateItem = $_POST['id'];
//     $newQuantity = (int) $_POST['qty'];
//     $stockLimit = (int) $_SESSION['cart'][$updateItem]['closingStock'];

//     if (isset($_SESSION['cart'][$updateItem])) {
//         if ($newQuantity <= $stockLimit) {
//             $_SESSION['cart'][$updateItem]['qty'] = $newQuantity;
//             echo "item Updated";
//         } else {
//             echo "Cannot exceed available stock of $stockLimit.";
//         }
//     }
// }

if (isset($_POST['action_type']) && $_POST['action_type'] == 'update') {
    $updateItem = $_POST['id'];
    $newQuantity = (int) $_POST['qty'];
    $stockLimit = (int) $_SESSION['cart'][$updateItem]['closingStock'];

    if (isset($_SESSION['cart'][$updateItem])) {
        if ($newQuantity <= $stockLimit) {
            $_SESSION['cart'][$updateItem]['qty'] = $newQuantity;
            echo "item Updated";
        } else {
            echo "Cannot exceed available stock of $stockLimit.";
        }
    }
}

?>
