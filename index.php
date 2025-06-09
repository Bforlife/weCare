<!-- the cart to cart is still misbehaving -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>weCare</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/indexStyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


</head>
<body>
<?php require 'nav.php';?>
<div class="main-content" id="main-content">
<div class="container mt-5">

<!-- Hero Section -->
<section class="hero bg-primary text-white text-center py-5">
    <div class="container">
        <h1>Welcome to weCare</h1>
        <p>Your one-stop destination for amazing beauty products</p>
        <a href="#" class="btn btn-light">Shop Now</a>

        
    </div>
</section>

<section class="row product-cards">
<?php 
        foreach ($products as $row){
        $image = explode(',', $row['image']);
        ?>
    <div class="col-lg-4 product-card">
        <img src="<?php echo $image[0]; ?>" alt="Image">
        <div class="product-info">
            <!-- this allows you to replace  the name with '-' so that  you can access the name of the product in the paraent folder -->
            <a href="<?php echo str_replace(' ','-',$row['productName']).'-'.$row['productCode'] ; ?>">
                <h3><?php echo $row['productName']; ?></h3>
            </a>
            <div class="cartDetails">
                <div class="price">$<?php echo $row['price']; ?></div>
                

    <div><i class="fa-solid fa-eye"></i></div>
                
            </div>


        <!-- Add to cart form/btn -->
        <form class="add-to-cart-form" method="POST">
        <input type="hidden"  value="<?php echo $row['productName']; ?>" name="productName">
        <input type="hidden" value="<?php echo $row['price']; ?>" name="price">
        <input type="hidden"  value="<?php echo $row['productCode']; ?>" name="productCode">
        <input type="hidden"  value="<?php echo $row['id']; ?>" name="id">
        <input type="hidden"  value="<?php echo $row['size']; ?>" name="size">
        <input type="hidden"  value="<?php echo $row['color']; ?>" name="color">
        <input type="hidden"  value="<?php echo $row['costPrice']; ?>" name="costPrice">
        <input type="hidden"  value="<?php echo $row['sellingPrice']; ?>" name="sellingPrice">
        <input type="hidden"  value="<?php echo $row['openingStock']; ?>" name="openingStock">
        <input type="hidden"  value="<?php echo $row['closingStock']; ?>" name="closingStock">
        <input type="hidden"  value="<?php echo $row['description']; ?>" name="description">

        <input type="hidden"   name="add_to_cart">

        
        <div class="cartSubmit">
<button>
    <i class="fa-solid fa-cart-shopping"></i> 
</button>

</div>
</form>
</div>
    </div>
    


<!-- Cart Modal -->
<div id="productModal" class="modal" style="display: none; padding-top:40px;">
<div class="modal-content">
    <span class="close">&times;</span>
    <div class="modal-body">
        <img id="modalImage" src="" alt="Product Image">
        <div class="details">
            <h3 id="modalTitle">Product Title</h3>
            <p id="modalPrice">$0.00</p>

            
                <!-- Color Selection -->
                    <div class="color-selection">
                <label for="productColor">Choose Color:</label>
                <select id="productColor">
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>
                    <option value="Green">Green</option>
                    <option value="Black">Black</option>
                </select>
            </div>

            <!-- Quantity Selection -->
            <div class="quantity-selection">
                <form class="update">
                <label for="productQuantity">Quantity:</label>
                <input type="text" value="<?php echo $row['productCode']; ?>">
                <input type="number" id="productQuantity" min="1" value="1">
                <input type="submit" value="Update" class="btn">
                </form>
            </div>
                <!-- Add to cart form/btn -->
                <form class="add-to-cart-form"  METHOD="POST">
        <input type="hidden"  value="<?php echo $row['productName']; ?>" name="productName">
        <input type="hidden" value="<?php echo $row['price']; ?>" name="price">
        <input type="hidden"  value="<?php echo $row['id']; ?>" name="id">
        <input type="hidden"  value="<?php echo $row['productCode']; ?>" name="productCode">
        <input type="hidden"  value="<?php echo $row['size']; ?>" name="size">
        <input type="hidden"  value="<?php echo $row['color']; ?>" name="color">
        <input type="hidden"  value="<?php echo $row['costPrice']; ?>" name="costPrice">
        <input type="hidden"  value="<?php echo $row['sellingPrice']; ?>" name="sellingPrice">
        <input type="hidden"  value="<?php echo $row['openingStock']; ?>" name="openingStock">
        <input type="hidden"  value="<?php echo $row['closingStock']; ?>" name="closingStock">
        <input type="hidden"  value="<?php echo $row['description']; ?>" name="description">
        <input type="hidden"   name="add_to_cart">
        <div class="cartSubmit">
<button>
    <i class="fa-solid fa-cart-shopping"></i> 
</button>



</div>
        
    </form>
        </div>
    </div>
</div>
</div>
<?php }?>

    
</section>
</div>
</div>
<!-- main content ends -->


<!-- footer -->
<?php require 'footer.php';?>

</body>


<script src="js/scripts.js"></script>
<script src="../jQuery/jQuery.js"></script>


<script>
$(document).ready(function() {
    $(".add-to-cart-form").submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var btn = form.find(".btn");

        btn.html("Adding...").prop("disabled", true).css("cursor", "not-allowed");

        $.ajax({
            url: 'cart.php',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log("Response from server:", data);

                if (data.trim() === "success") {
                    // alert("Item added to cart!");
                    window.location.href = "index.php";
                } else {
                    alert(data);
                }

                btn.html("Add to Cart").prop("disabled", false).css("cursor", "pointer");
            },
            error: function() {
                alert("Something went wrong.");
                btn.html("Add to Cart").prop("disabled", false).css("cursor", "pointer");
            }
        });
    });
});
</script>


<!-- <script>
$(document).ready(function() {
    $(".update").submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var btn = form.find(".btn");

        btn.html("updating...").prop("disabled", true).css("cursor", "not-allowed");

        $.ajax({
            url: 'cart.php',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // console.log("Response from server:", data);

                if (data.trim() === "item Updated") {
                    alert("Item Updated!");
                    window.location.href = "index.php";
                } else {
                    alert(data);
                }

                btn.html("Update").prop("disabled", false).css("cursor", "pointer");
            },
            error: function() {
                alert("Something went wrong.");
                btn.html("Update").prop("disabled", false).css("cursor", "pointer");
            }
        });
    });
});
</script> -->


</html>