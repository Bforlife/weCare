
<?php require 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Sales Summary</title>
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

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
  </style>
</head>
<body>


  <div class="main-content">
   <div class="container-fluid">

    <h2 class="mb-4">Hello, <?php echo $_SESSION['name'] ?>! <span>Here's your Order Summary</span></h2>
     <div class="table-responsive">
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

</body>
</html>
