<?php

require '../classes/productUploadClass.php';
// always remember to add 2 or more product images when inserting
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $formType = $_POST['form_action'];

    $obj = new insert();

    if ($formType === "product_upload") {
        $productName = $_POST['productName'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $image = $_FILES['image']['tmp_name']; //beware of this (images use $_files)
        $filetype = $_FILES['image']['name'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $costPrice = $_POST['costPrice'];
        $sellingPrice = $_POST['sellingPrice'];
        $openingStock = $_POST['openingStock'];
        $closingStock = $_POST['closingStock'];
        $productCode = $_POST['productCode'];

        $products = $obj->products(
            $productName,$category,$price,$quantity,$description,
            $image,$color,$size,$costPrice,$sellingPrice,
            $openingStock,$closingStock,$productCode,$filetype 
        );

        echo $products;
 if ($products === true) {
            echo "Inserted"; 
        } else {
            echo $products; 
        }
    }

    elseif ($formType === "account_creation") {
        $empty = " ";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $service_address = $_POST['service_address'];
        $referral_source = $_POST['referral_source'];
        $password = $_POST['password'];

        $insert = $obj->checkOut($name,$email,$phone, $empty,$password);

        if ($insert) {
            header("Location: ../createAccount.php?alert=Insert Successful");
          
        } else {
            header("Location: ../createAccount.php?warning=Failed to Insert");
      
        }
    }


}


?>