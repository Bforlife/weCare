<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product - Wecare Admin</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="../css/addProducts.css">

</head>
<body>

<?php require 'admin_nav.php'; ?>
  <div class="form-container">
    <h2>Add New Product</h2>
    <form class="add-product-form row g-3" enctype="multipart/form-data">

    <input type="hidden" name="form_action" value="product_upload">

 

<!-- success msg -->
 <div id="form-message" class="col-12 text-center fs-5"></div>
<!-- success msg ends -->
 
      <div class="col-12">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" id="product_name" name="productName" class="form-control" required>
      </div>

  

      <div class="col-12">
        <label for="category" class="form-label">Category</label>
        <select id="category" name="category" class="form-select" required>
          <option value="">Select Category</option>
          <option value="Skincare">Skincare</option>
          <option value="Makeup">Makeup</option>
          <option value="Fragrance">Fragrance</option>
          <option value="Haircare">Haircare</option>
          <option value="Bodycare">Bodycare</option>
        </select>
      </div>

      <div class="col-6">
        <label for="price" class="form-label">Price (₦)</label>
        <input type="number" id="price" name="price" class="form-control" required>
      </div>

      <div class="col-6">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" id="quantity" name="quantity" class="form-control" required>
      </div>

      <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
      </div>

      <div class="col-12">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" id="image" name="image[]" multiple class="form-control"  required>
        <small style="color:green;">Select 2 or more Images</small>
      </div>

      <div class="col-6">
        <label for="color" class="form-label">Color</label>
        <input type="text" id="color" name="color" class="form-control">
      </div>

      <div class="col-6">
        <label for="size" class="form-label">Size</label>
        <input type="text" id="size" name="size" class="form-control">
      </div>

      <div class="col-6">
        <label for="costPrice" class="form-label">Cost Price (₦)</label>
        <input type="number" step="0.01" id="costPrice" name="costPrice" class="form-control">
      </div>

      <div class="col-6">
        <label for="sellingPrice" class="form-label">Selling Price (₦)</label>
        <input type="number" step="0.01" id="sellingPrice" name="sellingPrice" class="form-control">
      </div>

      <div class="col-6">
        <label for="openingStock" class="form-label">Opening Stock</label>
        <input type="number" id="openingStock" name="openingStock" class="form-control">
      </div>

      <div class="col-6">
        <label for="closingStock" class="form-label">Closing Stock</label>
        <input type="number" id="closingStock" name="closingStock" class="form-control">
      </div>

      <div class="col-12">
        <label for="productCode" class="form-label">Product Code</label>
        <input type="text" id="productCode" name="productCode" class="form-control">
      </div>

      <div class="col-12 text-center">
        <input type="submit" class="btn-submit" value="Add Product">
        <!-- <button type="submit" class="btn-submit">Add Product</button> -->
      </div>
    </form>
</div>



  <script src="../jQuery/jQuery.js"></script>


<script>


$(document).ready(function () {
    $(".add-product-form").submit(function (e) {
        e.preventDefault();

        let form = $(this)[0];
        let formData = new FormData(form);

        $("#form-message").html('<span style="color: blue;">Submitting...</span>');

        $.ajax({
            url: "../controls/uploadProducts.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                let trimmed = response.trim();

                if (trimmed === "1" || trimmed === "true") {
                    $("#form-message").html('<span style="color:green;">Product added successfully! Reloading...</span>');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    $("#form-message").html('<span style="color:red;">' + trimmed + '</span>');
                }
            },
            error: function () {
                $("#form-message").html('<span style="color:red;">An error occurred. Try again.</span>');
            }
        });
    });
});


</script>

</body>
</html>