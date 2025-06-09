<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reviews</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="review-container">
    <h2>Share your experience</h2>
    <form action="" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_action" value="review_creation">

    <label for="rating">Rating *</label>
    <div class="stars">
      <input type="radio" name="star" id="star5"><label for="star5"><i class="fa-solid fa-star"></i></label>
      <input type="radio" name="star" id="star4"><label for="star4"><i class="fa-solid fa-star"></i></label>
      <input type="radio" name="star" id="star3"><label for="star3"><i class="fa-solid fa-star"></i></label>
      <input type="radio" name="star" id="star2"><label for="star2"><i class="fa-solid fa-star"></i></label>
      <input type="radio" name="star" id="star1"><label for="star1"><i class="fa-solid fa-star"></i></label>
    </div>

    <label for="review">Review</label>
    <textarea id="review" name="review_msg" rows="4" placeholder="Write your review here..."></textarea>

    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Your full name" required>

    <label for="email">Email </label>
    <input type="email" id="email" name="email" placeholder="Your email address" required>


   

    <button type="submit">Submit review</button>
  </div>
  </form>
</body>
</html>
