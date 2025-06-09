<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Sales Summary</title>
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- jQuery -->


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

    .main-content {
      margin-left: 250px; 
      padding: 20px;
    }

    h2 {
      color: var(--primary-color);
    }

    table.dataTable thead {
      background-color: var(--primary-color);
      color: white;
    }

    table.dataTable tbody td {
      background-color: #fff;
      color: var(--accent-color);
    }

    table.dataTable {
      /* border: 1px solid var(--primary-color); */
      border-radius: 6px;
      overflow: hidden;
    }

    .dataTables_filter input {
      padding: 8px;
      border: 1px solid var(--primary-color);
      border-radius: 4px;
      background-color: var(--secondary-color);
      color: var(--accent-color);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      background-color: var(--primary-color) !important;
      color: var(--button-text) !important;
      border-radius: 4px;
      padding: 5px 10px;
      margin: 2px;
    }

    .dataTables_wrapper .dataTables_length select {
      background-color: var(--secondary-color);
      border: 1px solid var(--primary-color);
      border-radius: 4px;
      padding: 4px;
    }
    a{
      text-decoration: none;
      color:#1A120B;
    }
  </style>
</head>
<body>


  <div class="main-content">
   <div class="container-fluid">

<h2 class="text-center">Orders</h2>     <div class="table-responsive">
    <table id="salesTable" class="table table-striped display wrap" style="width:100%">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Product Name</th>
          <th>Qty</th>
          <th>Color</th>
          <th>Size</th>
          <th>Total</th>
          <th>Payment Option</th>
          <th>Order Note</th>
          <th>Order Date</th>
           <th><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg></th>
              <!-- <th>id</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $order){?>
          <tr>
            <td><?php echo $order['order_id'] ?></td>
            <td><?php echo  $order['prdt_name'] ?></td>
            <td><?php echo $order['qty'] ?></td>
            <td><?php echo $order['color'] ?></td>
            <td><?php echo $order['size'] ?></td>
            <td>₦<?php echo number_format($order['total']) ?></td>
            <td><?php echo $order['pay_option'] ?></td>
            <td><?php echo $order['order_note'] ?></td>
            <td><?php echo $order['order_date'] ?></td>
         <td><a href="review.php?order_id=<?php echo $order['order_id'] ?>&prdt_id=<?php echo $order['prdt_id'] ?>">Review product</a>
</td>
<!-- <td><?php //echo $order['prdt_id']?></td> -->

          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  </div>
</div>

  <script>
    $(document).ready(function () {
      $('#salesTable').DataTable({
        responsive: true,
        pageLength: 10,
        // Search (f), table (t), pagination (p)
        dom: 'ftrip', 
      });
    });
  </script>


  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>
</html>
