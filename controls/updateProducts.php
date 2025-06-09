<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $productName = $_POST["productName"];
        $category = $_POST["category"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $description = $_POST["description"];
        $image = $_FILES['image']['tmp_name'];
        $color = $_POST["color"];
        $size = $_POST["size"];
        $costPrice = $_POST["costPrice"];
        $sellingPrice = $_POST["sellingPrice"];
        $openingStock = $_POST["openingStock"];
        $closingStock = $_POST["closingStock"];
        $productCode = $_POST["productCode"];



    require '../classes/update.php';
    
    $update = new update();


    $updateProduct = $update->updateProducts($id, $productName, $category, $price, $quantity,
     $description, $image, $color, $size, $costPrice,
      $sellingPrice, $openingStock, $closingStock, 
      $productCode);

    echo $updateProduct;

    
    // if ($updateProduct) {
    //     header("Location: ../admin/updateDetails.php?alert=Details Update Successful");
    // } else {
    //     header("Location: ../user/updateDeatails.php?warning=Details Update Failed");
    // }


}
?>
