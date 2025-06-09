<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <!-- Modal Background to update the payment status and delivery_date -->

<!-- <div id="updateModal" class="fixed  inset-0 z-50 bg-black bg-opacity-25 hidden flex items-center justify-center px-4"> -->
  <!-- <div class="bg-white w-full max-w-4xl p-6 rounded-2xl shadow-2xl relative max-h-[90vh] overflow-y-auto"> -->
    
    <!-- Close Button -->
    <!-- <button class="close-modal absolute top-3 right-3 text-gray-400 hover:text-red-500 text-2xl">&times;</button> -->
     <div>
    <h2 class="text-xl font-semibold mb-4 text-center text-gray-800">Update Product Record</h2>

    <!-- Form -->
    <form action="../controls/updateProducts.php" method="POST" class="space-y-4">
      <input type="text" name="id" id="id" value="<?php echo $row['id']?>" >

       <div class="col-12">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" id="product_name" name="productName" class="form-control"  value="<?php echo $row['productName']?>" required>
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

        <div class="row">
        <div class="col">
        <label for="price" class="form-label">Price (₦)</label>
        <input type="number" id="price" name="price" value="<?php echo $row['price']?>" class="form-control" required>
        </div>
        <div class="col">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']?>" class="form-control" required>
        </div>
        </div>


      <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description"rows="4" class="form-control" required></textarea>
      </div>

      <div class="col-12">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" id="image" name="image[]" multiple class="form-control">
        <small style="color:green;">Select 2 or more Images</small>
      </div>

      <div class="row">
        <div class="col">
    <label for="color" class="form-label">Color</label>
        <input type="text" id="color" name="color" value="<?php echo $row['color']?>" class="form-control">
        </div>

        <div class="col">
     <label for="size" class="form-label">Size</label>
        <input type="text" id="size" name="size" value="<?php echo $row['size']?>" class="form-control">
        </div>
        </div>


        <div class="row">
        <div class="col">
        <label for="costPrice" class="form-label">Cost Price (₦)</label>
        <input type="number" step="0.01" id="costPrice" value="<?php echo $row['costPrice']?>" name="costPrice" class="form-control">
        </div>
 
        <div class="col">
        <label for="sellingPrice" class="form-label">Selling Price (₦)</label>
        <input type="number" step="0.01" id="sellingPrice" value="<?php echo $row['sellingPrice']?>" name="sellingPrice" class="form-control">
        </div>

        </div>
            <div class="row">

        <div class="col">
        <label for="openingStock" class="form-label">Opening Stock</label>
        <input type="number" id="openingStock" value="<?php echo $row['openingStock']?>" name="openingStock" class="form-control">
        </div>

        <div class="col">
        <label for="closingStock" class="form-label">Closing Stock</label>
        <input type="number" id="closingStock" value="<?php echo $row['closingStock']?>" name="closingStock" class="form-control">
        </div>
        </div>

      <div class="col-12">
        <label for="">Prodcut Code</label>
        <input type="text" id="productCode" value="<?php echo $row['productCode']?>" name="productCode" class="form-control">
      </div>


      <div class="pt-2 text-center">
        <button type="submit" class="text-white px-6 py-2 rounded-lg  transition-all shadow" style="background-color: #1A120B;">
          Update Products
        </button>
      </div>
    </form>
  </div>
</div>

<!-- closing div  -->
 </div>
</body>
</html>