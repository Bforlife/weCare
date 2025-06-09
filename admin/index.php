<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   
</head>
<body>

<div class="container-fluid">
<div class="row">
<!-- Sidebar Navigation -->
<div class="col-md-2 col-sm-12 mb-3">
<?php 
require 'admin_nav.php';
?>
</div>

<!-- Main Dashboard Content -->
<div class="col-md-10 col-sm-12">
    <div class="d-flex justify-content-between mt-4">
        <div><h3  style="color:#1A120B">
Admin: <?php echo  $_SESSION['name'];?>
</h3></div>
        <div><a href="logout.php" style="color:#3C2A21;">Logout</a></div>
    </div>
<div class="container mt-3">


<div class="row text-center">
<!-- transfers  -->
<div class="col-lg-4 col-md-6 col-sm-12 mb-3">
<div class="card shadow-sm p-3 border-0 text-light" style="background-color:#3C2A21;">
<div class="card-body">
<div> <h3><?php echo $totaltransfer; ?> Transfers</h3></div>

</div>
</div>
</div>


<!-- Sales  -->
<div class="col-lg-4 col-md-6 col-sm-12 mb-3">
<div class="card shadow-sm p-3 border-0 text-light" style="background-color:#D5CEA3;">
<div class="card-body">
<h3 class="card-title" style="color:#3C2A21;"><?php echo $totalSales; ?> Sales</h3>
<p class="card-text display-6"></p>
</div>
</div>
</div>

<!-- cardpayments  -->
<div class="col-lg-4 col-md-6 col-sm-12 mb-3">
<div class="card shadow-sm p-3 border-0 text-light" style="background-color:#3C2A21;">
<div class="card-body">
<h3 class="card-title"> <?php  echo $totalcardPayment;?> Card Payments</h3>
<p class="card-text display-6"></p>
</div>
</div>
</div>
</div>

<!-- display the products and make them count the values -->

<div class="col-md-12 px-4 mt-5 pb-4" style=" border-radius:20px; margin-bottom: 20px;">
  <div class="col-12">
    <div class="mb-2" style="background-color:#D5CEA3; border-radius:7px;">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h3 class="card-title p-3 fs-2" style="color: #1A120B;">Products</h3>
          <p class="card-text display-6 p-3" style="color: #1A120B;"><?php echo $count = count($products);?></p>
        </div>
      </div>
    </div>


    <div class="table-responsive">
      <hr>


      <table id="productsTable"  class="table table-striped">
        <thead style="background-color:#D5CEA3;">
          <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Product Code</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Size</th>
            <th>Category</th>
            <th>Cost Price</th>
            <th>Selling Price</th>
            <th>Opening Stock</th>
            <th>Closing Stock</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

        <div class="err" style="color:red; text-align:center;"></div>

          <?php foreach ($products as $row) { 
            $image = explode(',', $row['image']);
          ?>
          <tr>
            <td> <img src="<?php echo $image[0]; ?>" alt="Image" width="50" style="border-radius:50%; padding:5px;"></td>
            <td><?php echo $row['productName']; ?></td>
            <td><?php echo $row['productCode']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['size']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['costPrice']; ?></td>
            <td><?php echo $row['sellingPrice']; ?></td>
            <td><?php echo $row['openingStock']; ?></td>
            <td><?php echo $row['closingStock']; ?></td>
            <td>
              <a href="update_product.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Update</a>
            </td>
            <td>
              <form class="deleteProduct">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          <?php } ?>
          <?php if(empty($row)){ ?>
            <tr>
              <td colspan="13" class="text-center">No products found.</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!--  script initiation-->


<script src="../jQuery/jQuery.js"></script>

<script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdn.tailwindcss.com"></script>

<script>
    $(document).ready(function() {
        $('#productsTable').DataTable();
    });
</script>



    <script>
        $(document).ready(function(){

            $(".deleteProduct").submit(function(e){
                e.preventDefault();

                $(".btn").val('Deleting...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'../controls/deleteProduct.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                            window.location="index.php"
                        }
                        else{
                            $(".err").html(data);
                        }

                         $(".btn").val('Login').prop('disabled',false).css('cursor' ,'pointer');
                    }


                })
            })

            
        })
    </script>

</body>
</html>


