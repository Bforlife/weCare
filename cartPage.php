<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>WeCare Cart</title>
  
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/cartPage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<?php require 'nav.php'; ?>

<div class="cart-container">
  
  <!-- Alert Message -->
  <div id="cart-alert" style="display: none; text-align: center; padding: 15px; font-size: 18px;"></div>

  <h2>Shopping Cart</h2>

  <div style="display: flex; justify-content: space-around; width: 100%;">

    <!-- Cart Items -->
    <div style="width: 60%;">
      <?php 
        $totalPrice = 0;

        if (!empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $item_id => $cartItem) {
            if (!empty($cartItem['name'])) {

              $itemTotal = $cartItem['price'] * $cartItem['qty'];
              $totalPrice += $itemTotal;

              foreach ($products as $row) {
                if ($row['productCode'] == $item_id) {
                  $images = explode(',', $row['image']);
                  $imagePath = $images[0];
                }
              }
      ?>
              <div class="cart-item">
                <img src="<?php echo $imagePath; ?>" alt="Image">
                
                <div class="cart-item-info">
                  <h4><?php echo $cartItem['name']; ?></h4>

                  <div class="quantity-selection">
                    <label for="productQuantity">Quantity:</label>
                    <form class="cart-action-form" method="post">
                      <input type="hidden" name="action_type" value="update">
                      <input type="hidden" name="id" value="<?php echo $item_id; ?>">
                      <input type="number" id="productQuantity" name="qty" min="1" value="<?php echo $cartItem['qty']; ?>">
                      <button class="btn" type="submit" name="update_item">Update</button>
                    </form>
                  </div>

                  <div style="padding: 20px;">
                    <form class="cart-action-form" method="post">
                      <input type="hidden" name="action_type" value="remove">
                      <input type="hidden" name="id" value="<?php echo $item_id; ?>">
                      <button class="btn" type="submit" name="remove_item">Remove</button>
                    </form>
                  </div>
                </div>

                <div class="cart-item-price">₦<?php echo number_format($itemTotal, 2); ?></div>
              </div>
      <?php
            }
          }
        } else {
          echo "
            <div style='display: flex; justify-content: center;  margin-left:32rem;'>
              <div style=' padding: 20px; text-align: center; border-radius: 8px;'>
                <p style='font-size: 20px; '>Your Cart is Empty</p>
                <a href='index.php'>
                  <button type='button' class='btn btn-outline-secondary' style='font-size: 20px; margin-top: 15px;'>Add To Cart</button>
                </a>
              </div>
            </div>";
        }
      ?>
    </div>


    <!-- Cart Summary -->
    <div style="width: 30%;">
      <?php if (!empty($_SESSION['cart'])) { ?>
        <div class="cartSumary">
          <h2>Cart Summary</h2>
          <hr>

          <div class="summaryprice">
            <h3>Items Total (<?php echo count($_SESSION['cart']); ?>)</h3>
            <span class="cart-item-price">₦<?php echo number_format($totalPrice, 2); ?></span>
          </div>

          <div class="summaryprice">
            <h3>Subtotal</h3>
            <span class="cart-item-price">₦<?php echo number_format($totalPrice, 2); ?></span>
          </div>

          <?php if (isset($_SESSION['id'])) { ?>
            <a href="user/checkOut.php">
              <button class="btn" style="margin-top: 20px;">
                <i class="fa-solid fa-cart-arrow-down"></i> Proceed to Checkout
              </button>
            </a>
          <?php } else { ?>
            <a href="login.php">
              <button class="btn" style="margin-top: 20px;">
                <i class="fa-solid fa-cart-arrow-down"></i> Proceed to Checkout
              </button>
            </a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>

  </div> <!-- End Flex Container -->

</div> <!-- End .cart-container -->

<!-- jQuery -->
<script src="../jQuery/jQuery.js"></script>

<script>
$(document).ready(function() {
  $(".cart-action-form").submit(function(e) {
    e.preventDefault();

    var form = $(this);
    var btn = form.find("button");

    btn.html("Processing...").prop("disabled", true).css("cursor", "not-allowed");

    $.ajax({
      url: 'cart.php',
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
        } else if (trimmedData === "item Removed") {
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
