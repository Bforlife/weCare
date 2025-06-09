
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap/min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="../css/checkOut.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>User | UpdateForm</title>
</head>
<style>
    label{
        color: #3C2A21;
    }
</style>
<body>
  <?php require 'nav.php' ?>


   

  <div class="checkout-content">
  <div class="delivery-options">
    <h2>Update Your Account Details</h2>
       <!-- success msg -->
    
    <p style="color:green;">
    <?php  if(isset($_GET['alert'])){echo $_GET['alert'];} ?></p>
        <p style="color:red;">
        <?php if(isset($_GET['warning'])){echo $_GET['warning'];} ?></p>

  <form class="row g-3 needs-validation" novalidate  action="../controls/updateCustomer.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">

  <div class="col-md-10">
    <label for="validationCustomname" class="form-label">Fullname</label>
    <input type="text" class="form-control" id="validationCustom01"  name="name" value=" <?php echo $_SESSION['name'];  ?>">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
<div class="d-flex justify-content-between col-10 gap-3">
<div class="col-6">
    <label for="validationCustom03" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="validationCustom03" name="phone" value=" <?php   echo $_SESSION['phone'];  ?>">
    <div class="invalid-feedback">
      Please Enter Your Phone Number
    </div>
  </div>

 <div class="col-6">
    <label for="validationCustomemail" class="form-label">Email</label>
    <input type="email" class="form-control" id="validationCustom05" name="email" value=" <?php  echo $_SESSION['email'];  ?>">
    <div class="invalid-feedback">
      Please provide a valid Email
    </div>
  </div>
</div>

<!-- start here -->
  
  <div class="col-md-10">
    <label for="validationCustomUsername" class="form-label">Address</label>
    <div class="input-group has-validation">
          <!-- update the user dashboard the fill in the user -->
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Work Plaza Abuja" name="service_address" value=" <?php  echo $_SESSION['service_address'];  ?>">
      <div class="invalid-feedback">
        Please Enter Your Address
      </div>
    </div>
  </div>

  <div class="col-md-10">
<label for="validationCustomreferral_source" class="form-label" style="color:#3C2A21;font-size:18px;">How did you hear about us?</label><br>
<select name="referral_source" id="referral_source" class="input-group has-validation" aria-describedby="inputGroupPrepend" required>
<option value="">Select One</option>
<option value="Google Search">Google Search</option>
<option value="Social Media">Social Media</option>
<option value="Friend or Family">Friend or Family</option>
<option value="Advertisement">Advertisement</option>
<option value="Other">Other</option>
</select>
</div>


<div class="col-md-10" id="password">
    <label for="">Password</label>
<input type="password" name="password" class="form-control" id="password" value="<?php  echo $_SESSION['password']; ?>"><br>
<!-- <small class="text-muted">You need to create an account to proceed.</small> -->
</div>
  
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" style="background-color: #D5CEA3; border:none; color:#3C2A21;" required>
      <label class="form-check-label" for="invalidCheck">
        <h5 class=ps-3> Agree to terms and conditions</h5>
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>



  <div class="col-12">
  <button class="btn" type="submit" id="saveAndContinue"> Update Details</button>
  </div>
</form>
</div>
</div>



  
</body>
<script src="../js/scripts.js"></script>
</html>
