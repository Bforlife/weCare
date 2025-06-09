<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="css/createAccount.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- content begin -->


<?php

 require 'nav.php';

?>

<h1 style="text-align:center; color:#3C2A21; margin:23px;" >Create Account</h1>


<form class="formClass" method="POST" action="controls/uploadProducts.php">

  <!-- success msg -->
  <div  class="col-lg-12 text-center fs-2" >
<p style="color:green;">
        <?php if(isset($_GET['alert'])){echo $_GET['alert'];} ?></p>
        <p style="color:red;">
        <?php if(isset($_GET['warning'])){echo $_GET['warning'];} ?></p>
</div>
<!-- to insert into  customers tb -->
<div class="row">
<div class="col-lg-12">
<input type="hidden" name="form_action" value="account_creation">

<label for="" style="color:#3C2A21;font-size:18px;">Fullname</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Enter Fullname" 
value="">
</div>
<div class="col-lg-12">
<label for="" style="color:#3C2A21;font-size:18px;">Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter Email"
value="" required>
</div>
<div class="col-lg-12">
<label for="" style="color:#3C2A21;font-size:18px;">Phone</label>
<input type="text" name="phone" id="phone" class="form-control" placeholder="eg. +234 90785648231" value="" required>
</div>


<div class="col-8">
<!-- <label for="" style="color:#3C2A21;font-size:18px;">Address</label> -->
<input type="text" name="service_address" id="service_address" class="form-control" placeholder="eg. No.49 workplaza,Aba. "  hidden>
</div>
</div> 


<!-- <label for="referral_source" style="color:#3C2A21;font-size:18px;">How did you hear about us?</label><br> -->
<select name="referral_source" id="referral_source" hidden>
<option value="">Select One</option>
<option value="Google Search">Google Search</option>
<option value="Social Media">Social Media</option>
<option value="Friend or Family">Friend or Family</option>
<option value="Advertisement">Advertisement</option>
<option value="Other">Other</option>
</select>

<!-- to insert into accounts tb -->
<div class="col-lg-10 d-flex flex-column mb-3">
<div class="form-check">
<!-- <label for="" style="color:#3C2A21;font-size:18px;">Create Account?</label> -->
<!-- <input class="form-check-input" name="create_account" type="checkbox" value="On" id="create_account"> -->



</div>
<div class="col-lg-12" id="password">
    <label for="">Password</label>
<input type="password" name="password" class="form-control" id="password"><br>
<!-- <small class="text-muted">You need to create an account to proceed.</small> -->
</div>
<input type="hidden" name="id" value="1">
<input type="submit" class="btn shadow mb-4" value="Create Account" style="background-color:#3C2A21; color:#fff;border:none;"> 
</form>
</div>
</div>
</div>
</div>

</div>
</div>
</section>


</div>
<!-- content close -->

<!-- footer begin -->
<?php
// require 'footer.php';
?>
<!-- footer ends -->
<script>

// function to toggle the password input
// const create_account = document.querySelector('#create_account');
// const password = document.querySelector('#password');

// hidden password input
// password.style.display="none";
// create_account.addEventListener('change',function(){
//     if(create_account.checked){
//         password.style.display= "block";
//     }else{
//     password.style.display = "none";
// }
// });


</script>



</html>