

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sales</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

  <!-- Custom CSS -->
  <style>
    :root {
      --primary-color: #3C2A21;
      --secondary-color: #D5CEA3;
      --background-color: #E5E5CB;
      --accent-color: #1A120B;
      --text-color: var(--accent-color);
      --button-bg: var(--primary-color);
      --button-text: #fff;
      --price-color: #28a745;
    }

    body {
      background-color: var(--background-color);
      color: var(--text-color);
      font-family: Arial, sans-serif;
    }

    h1 {
      color: var(--primary-color);
    }

    .table thead {
      background-color: var(--primary-color);
      color: white;
    }

    .btn-icon {
      margin-right: 5px;
      color: var(--primary-color);
    }

    .btn-icon:hover {
      color: var(--accent-color);
    }

    .text-price {
      color: var(--price-color);
    }

    .dataTables_filter input {
      border: 1px solid var(--primary-color);
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-lg-2 col-md-3 p-3">
      <?php require "admin_nav.php"; ?>
    </div>

    <!-- Main Content -->
    <div class="col-lg-10 col-md-9 p-4">
      <div class="d-flex flex-row" style="justify-content: space-between;">
      <div>      <h1 class="text-center mb-4">Order Records</h1></div>
      <div><h2><?php echo $count= (count($sales)) ?></h2></div>
      </div>

      <?php
      $grouped_sales = [];
      foreach ($sales as $sale) {
          $order_id = $sale['order_id'];
          if (!isset($grouped_sales[$order_id])) {
              $grouped_sales[$order_id] = [];
          }
          $grouped_sales[$order_id][] = $sale;
      }
      ?>


<!-- ERROR MSG -->
 <div class="err" style="color:red;"></div>
      <div class="table-responsive">
        <table id="salesTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Order ID</th>
                <th>Product Name</th>
              <th>Customer</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Total Products</th>
              <th>Total Amount</th>
              <th>Order Date</th>
               <th>Delivery Date</th>
                <th>Payment Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($grouped_sales as $order_id => $sales_group){ 
              $main_sale = $sales_group[0];
              $count = count($sales_group);
              $total_amount = 0;
              foreach ($sales_group as $s) {
                  $total_amount += $s['total'];
              }
            ?>

     
              <tr>
                <td><?php echo $order_id ?></td>
                 <td><?php echo $main_sale['prdt_name'] ?></td>
                <td><?php echo $main_sale['customer_name'] ?></td>
                <td><?php echo $main_sale['phone'] ?></td>
                <td><?php echo $main_sale['email'] ?></td>
                <td><?php echo $count ?></td>
                <td class="text-price">₦<?php echo number_format($total_amount) ?></td>
                <td><?php echo $main_sale['order_date'] ?></td>
                 <td><?php echo $main_sale['delivery_date'] ?></td>
                  <td><?php echo $main_sale['payment_status'] ?></td>
                <td>
  <div style="display: flex; align-items: center; gap: 8px;">
    <!-- View Button -->
    <a href="view_order.php?order_id=<?php echo $order_id; ?>" class="btn-icon" title="View">
      <i class="fas fa-eye"></i>
    </a>

    <!-- Update Button -->
    <a href="updateSales.php?order_id=<?php echo $order_id; ?>" class="btn-icon" title="Update">
      <i class="fas fa-pen"></i>
    </a>

    <!-- Delete Button -->
    <form class="deteleSales" style="display: inline;">
      <input type="hidden" name="order_id" value="<?php echo $main_sale['order_id']; ?>">
      <input type="submit" class=" btn btn-icon text-danger" title="Delete"  value="Delete"> 
      <!-- <i class="fa-solid fa-trash"></i> -->

      <!-- work on this -->
<!-- <form class="deteleSales" style="display: inline;">
  <input type="hidden" name="order_id" value="<?php //echo $main_sale['order_id']; ?>">
  <button type="submit" class="btn btn-icon text-danger" title="Delete">
    <i class="fa-solid fa-trash"></i>
  </button>
</form> -->
     
      
      <!-- </button> -->
    </form>
  </div>
</td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function () {
    $('#salesTable').DataTable({
      paging: true,
      searching: true,
      responsive: true,
      lengthMenu: [8, 16, 25, 50],
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search Orders..."
      }
    });
  });
</script>

<!-- JS Scripts -->
<script src="../jQuery/jQuery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>




<script>
        $(document).ready(function(){

            $(".deteleSales").submit(function(e){
                e.preventDefault();

                $(".btn").val('Deleting...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'../controls/deleteSales.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                          confirm("Are You Sure You Want To  Delete Sales");
                             window.location="salesView.php";
                        }
                        else{
                            $(".err").html(data);
                        }

                         $(".btn").val('Delete').prop('disabled',false).css('cursor' ,'pointer');
                    }


                })
            })

            
        })
    </script>

</body>
</html>
