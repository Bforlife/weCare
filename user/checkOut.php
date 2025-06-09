
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="../css/checkOut.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Checkout</title>
</head>
<body>
  <?php require 'nav.php' ?>


  <div class="checkout-content">
  <div class="delivery-options"  style="background-color:#D5CEA3; margin-bottom: 30px;">
    <h2>Checkout</h2>
    <p>Enter your shipping address below</p>

  <form class="row g-3"  action="handle_checkout.php" method="post">

  <div class="col-md-10">
    <label for="validationCustomname" class="form-label">Fullname</label>
    <input type="text" class="form-control" id="validationCustom01"  name="name" value=" <?php   echo $_SESSION['name'];  ?>">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
<div class="d-flex justify-content-between col-10 gap-3">
<div class="col-5">
    <label for="validationCustom03" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="validationCustom03" name="phone" value=" <?php   echo $_SESSION['phone'];  ?>">
    <div class="invalid-feedback">
      Please Enter Your Phone Number
    </div>
  </div>

 <div class="col-5">
    <label for="validationCustomemail" class="form-label">Email</label>
    <input type="email" class="form-control" id="validationCustom05" name="email" value=" <?php  echo $_SESSION['email'];  ?>">
    <div class="invalid-feedback">
      Please provide a valid Email
    </div>
  </div>
</div>
  
  <div class="col-md-10">
    <label for="validationCustomUsername" class="form-label">Address</label>
    <div class="input-group has-validation">

      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Work Plaza Abuja" name="service_address" value=" <?php echo $_SESSION['service_address'];?>">
      <div class="invalid-feedback">
        Please Enter Your Address
      </div>
    </div>
  </div>


<div class="mb-3 col-10">
  <label for="textarea" class="form-label"> Order Note</label>
  <textarea class="form-control" name="order_note" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<!-- hidden values for order_id, order_date and delivery_status -->
<div class="row g-3">
  <div class="col">
    <input type="hidden" class="form-control" name="order_id">
  </div>
  <div class="col">
    <input type="hidden" class="form-control" name="order_date">
  </div>
  <div class="col">
    <input type="hidden" class="form-control"  name="delivery_date">
  </div>
    <div class="col">
    <input type="hidden" class="form-control"  name="total">
  </div>
  <div class="col">
    <input type="hidden" class="form-control" name="payment_status" value="Pending">
  </div>

</div>
  
  
  <div class="col-12">
  <button class="btn" type="submit" id="saveAndContinue"> save and continue </button>
  </div>
</form>
</div>
</div>



  
</body>
<script src="../js/scripts.js"></script>
</html>
