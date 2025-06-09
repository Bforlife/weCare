<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap/min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="../css/option.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php require 'nav.php'; ?>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <h2 class="mb-4">Choose Payment Method</h2>
      <!-- card option -->
          <form method="post" action="pay_option_handler.php">
  <input type="hidden" name="pay_option" value="card">
  <button type="submit" class="payment-option w-100 mb-3 text-center border-0">
    <h4 class="p-2"><i class="fa-solid fa-credit-card" style="color: #3c2a21;"></i> Card Payment</h4>
    <p class="ps-2">Pay securely with your debit/credit card.</p>
  </button>
</form>
     
<!-- transfer option -->
       <form method="post" action="pay_option_handler.php">
  <input type="hidden" name="pay_option" value="transfer">
  <button type="submit" class="payment-option w-100 text-center border-0">
    <h4 class="p-2"><i class="fa-solid fa-building-columns" style="color: #3c2a21;"></i> Bank Transfer</h4>
    <p class="ps-2">Transfer directly to our account.</p>
  </button>
</form>
      </div>
    </div>
  </div>






</body>
</html>
