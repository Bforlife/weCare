<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bank Transfer Details</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap/min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="../css/transfer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
</head>
<body>

<?php  require 'nav.php';
?>


  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow"  style="background-color: #D5CEA3; border:none;">
          <h3 class="mb-4 text-center">Bank Transfer Details</h3>
       
          <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item bg-transparent"><strong>Bank Name:</strong> Zenith Bank</li>
            <li class="list-group-item bg-transparent"><strong>Account Number:</strong> 1234567890</li>
            <li class="list-group-item bg-transparent"><strong>Account Name:</strong> MmasCode</li>
            <li class="list-group-item bg-transparent"> <strong>Reference:</strong> YourOrderID123</li>
          </ul>
          <p>Please complete your transfer using the details above. After payment, kindly send proof to our support.</p>
          <!-- ths btn should insert into the database -->
         <form action="../controls/sales.php" method="POST">
  <input type="hidden" name="payment_method" value="transfer">
  <button type="submit" class="btn btn-back mt-3" style="background-color:#3C2A21; color:white;">Complete Payment</button>
</form>

        </div>
      </div>
    </div>
  </div>

</body>
</html>
