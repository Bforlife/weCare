<?php 
//require 'phpHeaderFiles.php';

$path = $_SERVER['SCRIPT_NAME']; 

$ar = explode('-',$path);
$code = $ar[count($ar)-1];
$prd_code = explode('.',$code);

$productId =  $prd_code[0];


$data = $obj->getSingleProduct($productId);
?>
<?php 
if($data){
    
     $image = explode(',', $data->image);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="css/detailsPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
.relatedProducts{
display: flex;
gap: 20px;
padding: 20px;
background-color: #fff;
margin: 20px auto;
max-width: 1400px;
border: 1px solid #ddd;
border-radius: 5px;
}
</style>
</head>
<body>
<div class="product-page-container">
    <div class="product-gallery">
        <img src="<?php echo  $image[0];  ?>" alt="Product Image" class="main-image">
        <div class="thumbnail-gallery">
            <?php
                foreach($image as $productImg){  ?>
            <img src="<?php echo  $productImg;  ?>" alt="">
            <?php } ?>
        </div>
    </div>
    <div class="product-details">
        <h1 class="product-title"><?php echo $data->productName; ?></h1>
        <p class="product-price"><?php echo $data->price; ?></p>
        <p class="product-description">
        <?php echo $data->description; ?>
        </p>
        <div class="product-options">
            <label for="productColor">Choose Color:</label>
            <select id="productColor">
                <option value="Red">Red</option>
                <option value="Blue">Blue</option>
                <option value="Green">Green</option>
                <option value="Black">Black</option>
            </select>
            <label for="productQuantity">Quantity:</label>
            <input type="number" id="productQuantity" min="1" value="1">
        </div>
        <button class="btn add-to-cart-btn"> Add to Cart</button>
    </div>
</div>

<!-- Product Details Tab -->
<div class="product-detail" id="details">
<h3 class="mt-3">Product Details</h3>
<p><?php echo $data->description; ?></p>

</div>
<div class="product-specifications">
    <h3>Specifications</h3>
    <ul>
        <li> Color: <?php echo $data->color; ?></php></li>
        <li>Size: <?php echo $data->size; ?></php></li>
        <li>category:<?php echo $data->category; ?></php></li>
        <li>Selling Price:<?php echo $data->price; ?></php></li>
    </ul>
</div>

<!-- reviews -->
<?php require 'productReviewPage.php'; ?>

</div>
<div class="relatedProducts">
    <h2>Related products</h2>
   

</div>
<?php     } ?>

<?php require 'footer.php'; ?>


</body>
</html>