<?php 
// require 'headerFiles.php'?>


<div><?php require 'admin_nav.php';?></div>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update Product</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Custom Colors -->
  <style>
    :root {
      --primary-color: #3C2A21;
      --secondary-color: #D5CEA3;
      --background-color: #E5E5CB;
      --accent-color: #1A120B;
      --text-color: var(--accent-color);
      --button-bg: var(--primary-color);
      --button-text: #fff;
    }

    body {
      background-color: var(--background-color);
      color: var(--text-color);
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .form-container {
      background-color: #fff;
      padding: 2rem;
      border-radius: 1rem;
      /* max-width: 1200px; */
      margin: 5vh auto;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    .form-title {
      color: var(--primary-color);
    }
    .h2{
      color: var(--accent-color);
    }

    .btn-custom {
      background-color: var(--accent-color);
      color: var(--button-text);
    }

    .btn-custom:hover {
      background-color: var(--primary-color);
    }

    label {
      font-weight: 500;
    }
  </style>
</head>
<body>
<div class="d-flex flex-row">






<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="form-container">

    <h2 class="text-center mb-4 form-title h2" >Update Product Record</h2>

    <?php 
      if($selected){
        ?>
    <form  class="updateForm" enctype="multipart/form-data">
        <div class="err" style="color: red; text-align:center;"></div>

      <input type="hidden" name="id" id="id" value="<?php echo $selected->id; ?>">

      <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" id="product_name" name="productName" class="form-control" value="<?php  echo $selected->productName; ?>" required>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select id="category" name="category" class="form-select" required>
          <option value="<?php echo $selected->category; ?>">Select Category</option>
          <option value="SkinCare">Skincare</option>
          <option value="MakeUp">Makeup</option>
          <option value="Fragrance">Fragrance</option>
          <option value="Haircare">Haircare</option>
          <option value="Bodycare">Bodycare</option>
        </select>
      </div>

      <div class="row g-3">
        <div class="col">
          <label for="price" class="form-label">Price (₦)</label>
          <input type="number" id="price" name="price" class="form-control" value="<?php echo $selected->price; ?>" required>
        </div>
        <div class="col">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" id="quantity" name="quantity" class="form-control" value="<?php echo $selected->quantity; ?>" required>
        </div>
      </div>

      <div class="mt-3 mb-3">
        <label for="description" class="form-label">Description</label>
        <?php echo " <textarea id='description' name='description' rows='4' class='form-control' required >" 
        . htmlspecialchars($selected->description) .
        "</textarea>"?>
       
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" id="image" name="image[]" multiple class="form-control">
        <small class="text-success">Select 2 or more Images</small>
      </div>

      <div class="row g-3">
        <div class="col">
          <label for="color" class="form-label">Color</label>
          <input type="text" id="color" name="color" class="form-control" value="<?php echo $selected->color; ?>">
        </div>
        <div class="col">
          <label for="size" class="form-label">Size</label>
          <input type="text" id="size" name="size" class="form-control" value="<?php echo $selected->size; ?>">
        </div>
      </div>

      <div class="row g-3 mt-3">
        <div class="col">
          <label for="costPrice" class="form-label">Cost Price (₦)</label>
          <input type="number" step="0.01" id="costPrice" name="costPrice" class="form-control" value="<?php echo $selected->costPrice; ?>">
        </div>
        <div class="col">
          <label for="sellingPrice" class="form-label">Selling Price (₦)</label>
          <input type="number" step="0.01" id="sellingPrice" name="sellingPrice" class="form-control" value="<?php echo $selected->sellingPrice; ?>">
        </div>
      </div>

      <div class="row g-3 mt-3">
        <div class="col">
          <label for="openingStock" class="form-label">Opening Stock</label>
          <input type="number" id="openingStock" name="openingStock" class="form-control" value="<?php echo $selected->openingStock; ?>">
        </div>
        <div class="col">
          <label for="closingStock" class="form-label">Closing Stock</label>
          <input type="number" id="closingStock" name="closingStock" class="form-control" value="<?php echo $selected->closingStock; ?>">
        </div>
      </div>

      <div class="mt-3 mb-3">
        <label for="productCode" class="form-label">Product Code</label>
        <input type="text" id="productCode" name="productCode" class="form-control" value="<?php echo $selected->productCode; ?>">
      </div>

      <div class=" d-flex gap-3">
        <input type="submit" class="btn btn-custom px-4 py-2" style="background-color:#3C2A21; color:white;" value="Update Product">
        <!-- <button type="submit" class="btn btn-custom px-4 py-2" style="background-color:#3C2A21; color:white;">Update Product</button> -->
        <div style="background-color:#3C2A21;" class="btn btn-custom px-4 py-2">
        <a href="index.php" style="text-decoration:none; color:white;">Back</a>

        </div>
      </div>
    </form>
  </div>
</div>

  <?php }
else{ ?>
    <div class="container text-center mt-5">
      <h4 class="text-danger">Update form not found</h4>
    </div>
<?php } ?>

  <!-- ending div -->
</div>
   </div>

   <script src="../bootstrap/js/bootstrap.min.js"></script>
   <script src="../jQuery/jQuery.js"></script>

<script>
        $(document).ready(function(){

            $(".updateForm").submit(function(e){
                e.preventDefault();

                $(".btn").val('Updating...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'../controls/updateProducts.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                          console.log(data)
                          alert('Updated');
                            // window.location="update_product.php";
                        }
                        else{
                            $(".err").html(data);
                        }

                         $(".btn").val('Update Product').prop('disabled',false).css('cursor' ,'pointer');
                    }


                })
            })

            
        })
    </script>



</body>
</html>
