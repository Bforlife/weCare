<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Display</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="css/detailsPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<?php  require 'nav.php';?>
<div class="product-page-container">
    <div class="product-gallery">
        <img src="pics/blush set.webp" alt="Product Image" class="main-image">
        <div class="thumbnail-gallery">
            <img src="pics/blush set.webp" alt="Thumbnail 1">
            <img src="pics/blushset1.jpg" alt="Thumbnail 2">
            <img src="pics/blshset2.jpg" alt="Thumbnail 3">
        </div>
    </div>
    <div class="product-details">
        <h1 class="product-title">Blush Set - 13pcs/19pcs/25pcs Makeup Brush Set</h1>
        <p class="product-price">$10.00</p>
        <p class="product-description">
            Complete Set: 13PCS black makeup brushes set includes all the essential brushes for a flawless makeup application.
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
        <button class="btn add-to-cart-btn">Add to Cart</button>
    </div>
</div>

<!-- Product Details Tab -->
<div class="product-detail" id="details">
<h3 class="mt-3">Product Details</h3>
<p>This blush set is designed for makeup enthusiasts and professionals alike. It includes a variety of brushes for different applications, ensuring a flawless finish every time.</p>
<ul>
    <li>Material: High-quality synthetic fibers.</li>
    <li>Durability: Long-lasting and easy to clean.</li>
    <li>Packaging: Comes in a sleek, travel-friendly pouch.</li>
</ul>
</div>
<div class="product-specifications">
    <h3>Specifications</h3>
    <ul>
        <li>Number of Shades: 12 distinct blush colors.</li>
        <li>Formula/Finish: Matte, shimmer, and satin finishes.</li>
        <li>Pigmentation: Buildable, ranging from sheer to moderately pigmented.</li>
        <li>Texture: Finely milled for smooth application.</li>
    </ul>
</div>

<!-- reviews -->
    <?php require 'productReviewPage.php'; ?>



     
   


            <!-- footer -->
    <?php require 'footer.php'; ?>
</body>
<script src="js/scripts.js"></script>
</html>
