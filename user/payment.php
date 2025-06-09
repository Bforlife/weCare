<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WeCare Checkout - Payment</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="jQuery/jQuery.js"></script>
  <link rel="stylesheet" href="../css/payment.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

    <?php  require 'nav.php'; ?>

  <div class="checkout-container" style=" margin-top: 60px;background-color:#D5CEA3;">
 
    <h2> PAYMENT </h2>
    <form action="../controls/sales.php" method="POST">
      <input type="hidden" name="pay_option" value="<?php //echo $_SESSION['pay_option']; ?>">

      <label for="cardName">Name on Card</label>
      <input type="text" id="cardName" name="cardName" placeholder="Enter Your Card Name" required>

      <label for="cardNumber">Card Number</label>
      <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required>

      <div class="row">
        <div class="col-md-6">
          <label for="expiry">Expiration Date</label>
          <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
        </div>
        <div class="col-md-6">
          <label for="cvv">CVV</label>
          <input type="text" id="cvv" name="cvv" placeholder="123" required>
        </div>
      </div>

      <div class="mb-3 text-center mt-4">
        <i class="fa-brands fa-cc-visa fa-2x mx-2" style="color: #3c2a21;"></i>
        <i class="fa-brands fa-cc-mastercard fa-2x mx-2 " style="color: #3c2a21;"></i>
      </div>
      
      <!-- use form to submit and insert into sales table -->
     
      <form action="../controls/sales.php" method="POST">
  <input type="hidden" name="payment_method" value="card">
  <button type="submit" class="btn btn-back mt-3" style="background-color:#3C2A21; color:white;">Complete Payment</button>
</form>

    </form>
  </div>
  </main>


  <!--  -->
</body>
</html>
