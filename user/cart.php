<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User | Cart</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../css/cartPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<div>
    <!-- hide the cart-items when the cart is empty -->
    <?php require 'nav.php';    
    ?>
  <div class="cart-container">

    <!-- Alert Message -->
  <div id="cart-alert" style="display: none; text-align: center; padding: 15px; font-size: 18px;"></div>

    <h2>Shopping Cart</h2>
    
<div style="display: flex;justify-content: space-around;width:80%; margin-left:15rem;">
    <div style="width:48%;">
    <?php 
$totalPrice = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item_id => $cartItem) {
        if (!empty($cartItem['name'])) {
          
// get the total price by multipying price and qty
$itemTotal = $cartItem['price'] * $cartItem['qty'];
$totalPrice += $itemTotal;

// display the images
foreach ($products as $row) {
if ($row['productCode'] == $item_id) {
$images = explode(',', $row['image']);
$imagePath = $images[0];
}}
?>
    <div class="cart-item" style=" background-color: #D5CEA3;">
    <img src="<?php echo $imagePath; ?>" alt="Image">
        <div class="cart-item-info">
            <!-- echo the  cart total ontop -->
             <div style="display: flex;  justify-content: space-between;">
             <div><h4><?php echo $cartItem['name']; ?></h4></div>
             <div class="cart-item-price">₦<?php echo number_format($itemTotal, 2); ?></div>
             </div>
            
       
            
            <div class="quantity-selection">
                
                <label for="productQuantity">Quantity:</label> <br>
                <form class="quantity-selection cart-action-form" method="post">
                    <!-- displayed flex for better visibility -->

                    <!-- hidden input for update -->
                     <input type="hidden" name="action_type" value="update">

                    <div style="border:1px soild red; display:flex; gap:5px;">
                <input type="hidden" name="id" value="<?php echo $item_id; ?>">
                    <div><input type="number" id="productQuantity" name="qty"  min="1" value="<?php echo $cartItem['qty']; ?>"></div>
                    <div><button class="btn" type="submit" name="update_item">Update</button></div>
                    </div>
            </div>
            </form>
            <div style="padding:20px;">
                <form  class="cart-action-form"  method="post">
                    <!-- hidden input for the action type -->
                      <input type="hidden" name="action_type" value="remove">

                    <input type="hidden" name="id" value="<?php echo $item_id; ?>">
                    <button class=" btn" type="submit" name="remove_item">Remove</button>
                </form>
            </div>
        </div>
       
    </div>
  
<?php
      
    }
} }else {
    
          echo "
            <div style='display: flex; justify-content: center;'>
              <div style='background-color:#; padding: 20px; text-align: center; border-radius: 8px;'>
                <p style='font-size: 20px; '>Your Cart is Empty</p>
                <a href='../index.php'>
                  <button type='button' class='btn btn-outline-secondary' style='font-size: 20px; margin-top: 15px;'>Add To Cart</button>
                </a>
              </div>
            </div>";
        }
      ?>


</div>
  <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){ ?>
<div style="width:30%;">
    <div class="cartSumary" style=" background-color: #D5CEA3;">
        <h2>Cart Summary</h2>
        <hr>
        <div class="summaryprice">
            <h3>Items Total (<?php echo count($_SESSION['cart']); ?>)</h3>
            <span class="cart-item-price">₦<?php echo number_format(@$totalPrice, 2); ?></span>
        </div>

        <div class="summaryprice">
            <h3>Total Price</h3>
            <span class="cart-item-price">₦<?php echo number_format(@$totalPrice, 2); ?></span>
        </div>

        <a href="checkout.php">
            <button class="btn" style="margin-top: 20px; background-color:#3C2A21; color:white;">
                <i class="fa-solid fa-cart-arrow-down"></i> Proceed to Checkout
            </button>
        </a>
    </div>
</div>
<?php } 

?>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../jQuery/jQuery.js"></script>

    <!-- <script src="jQuery/jQuery.js"></script> -->


    <script>
$(document).ready(function() {
  $(".cart-action-form").submit(function(e) {
    e.preventDefault();

    var form = $(this);
    var btn = form.find("button");

    btn.html("Processing...").prop("disabled", true).css("cursor", "not-allowed");

    $.ajax({
      url: '../cart.php',
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        var trimmedData = data.trim();
        var alertDiv = $("#cart-alert");

        alertDiv.css("display", "block").css("color", "green");

        if (trimmedData === "item Updated") {
          
          alertDiv.text("Item quantity updated!");


        } else 
    if (trimmedData === "item Removed") {
          alertDiv.text("Item removed from cart!");
          form.closest(".cart-item").remove();

          if ($(".cart-item").length === 0) {
            $(".cartSumary").hide();
          }
        } else {
          alertDiv.css("color", "red").text(trimmedData);
        }

        setTimeout(function() {
          alertDiv.fadeOut();
        }, 4000);

        btn.html(btn.attr("type") === "submit" ? "Update" : "Remove")
            .prop("disabled", false)
            .css("cursor", "pointer");
      },
      error: function() {
        var alertDiv = $("#cart-alert");
        alertDiv.css("display", "block").css("color", "red").text("Something went wrong.");

        setTimeout(function() {
          alertDiv.fadeOut();
        }, 4000);

        btn.html("Try Again").prop("disabled", false).css("cursor", "pointer");
      }
    });
  });
});
</script>

</body>
</html>
