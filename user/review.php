<?php //require 'headerFilesUser.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Leave a Review<?php ?></title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
  
    .form-container {
      /* width: 80%; */
      margin: 5vh auto;
      background-color: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .form-title {
      color: #3C2A21;
    }
  </style>
</head>
<body>


<div style="display:flex; justify-content:right ;">
  <div><?php require 'nav.php';


 

  ?></div>
  <!-- main cont -->
<div class="col-10">
  <div class="container form-container">
    <h2 class="form-title text-center mb-4">Submit Product Review</h2>
    <form  method="POST" class="reviewInsert" style="width:60%;margin-left:14rem; justify-content: center;">
      <div class="mb-3">
        <!-- success msg -->
        <div class="err"></div>
        <!-- <label for="id" class="form-label">Product ID</label> -->
        <input type="hidden" id="prdt_id" name="prdt_id" class="form-control"   value="<?php echo $order['id'];?>" readonly>
         <input type="hidden" name="order_id"  value="<?php echo $order['order_id'];?>" readonly>
      </div>


      <div class="mb-3">
        <!-- <label for="customer_name" class="form-label">Customer Name</label> -->
        <input type="hidden" id="customer_name"  value="<?php echo $order['customer_name'];?>" name="customer_name" class="form-control" required>
      </div>

      <div class="mb-3">
        <!-- <label for="email" class="form-label">Customer Email</label> -->
        <input type="hidden" id="email" value="<?php echo $order['email'];?>" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="review_msg" class="form-label">Your Review</label>
        <textarea id="review_msg" name="review_msg" rows="4" class="form-control" placeholder="Share your experience..." required></textarea>
      </div>

      <div class="mb-3">
        <label for="review_star" class="form-label">Rating</label>
        <select id="review_star" name="review_star" class="form-select" required>
          <option value="">Select Rating</option>
          <option value="1">⭐</option>
          <option value="2">⭐⭐</option>
          <option value="3">⭐⭐⭐</option>
          <option value="4">⭐⭐⭐⭐</option>
          <option value="5">⭐⭐⭐⭐⭐</option>
        </select>
      </div>

  

      <div class="d-grid gap-2">
           <input type="submit" class="btn" value="Submit Review" style="background-color:#3C2A21; color:white;">
      </div>
    </form>

  </div>
  </div>

</div>
</div>


<script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../jQuery/jQuery.js"></script>
<script>
$(document).ready(function () {
    $(".reviewInsert").submit(function (e) {
        e.preventDefault();
        const form = this;
        const btn = $(".btn", form);
        btn.val('Inserting...').prop('disabled', true).css('cursor', 'not-allowed');

        $.ajax({
            url: "../controls/review.php",
            method: 'POST',
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                const response = data.trim();
                if (response === "Review submitted successfully!") {
                    $(".err").html(`<span style="color:green;">${response}</span>`);
                    form.reset(); 
                } else {
                    $(".err").html(`<span style="color:red;">${response}</span>`);
                }

                btn.val('Submit Review').prop('disabled', false).css('cursor', 'pointer');
            },
            error: function () {
                $(".err").html(`<span style="color:red;">Something went wrong. Try again later.</span>`);
                btn.val('Submit Review').prop('disabled', false).css('cursor', 'pointer');
            }
        });
    });
});

</script>
</body>
</html>
