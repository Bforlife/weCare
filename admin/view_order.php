
<!-- not finished -->
<?php
require 'headerFiles.php';


$order_id = $_GET['order_id'];

if (!$order_id) {
    echo "Invalid Order ID";
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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

        .table th {
            background-color: var(--secondary-color);
        }

        .btn-custom {
            background-color: var(--button-bg);
            color: var(--button-text);
        }

        .btn-custom:hover {
            background-color: #2d1f15;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4 text-center" style="color: var(--primary-color);">Order Details (ID: <?php echo $order_id; ?>)</h2>

    <!-- Customer Information -->
     <?php if (!empty($sales)) {
    $customer = $sales[0]; ?>
    <div class="mb-4">
        <h5>Customer Information</h5>
        <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> <?php echo $customer['customer_name']; ?></li>
            <li class="list-group-item"><strong>Phone:</strong> <?php echo $customer['phone']; ?></li>
            <li class="list-group-item"><strong>Email:</strong> <?php echo $customer['email']; ?></li>
            <li class="list-group-item"><strong>Order Date:</strong> <?php echo $customer['order_date']; ?></li>
        </ul>
    </div>
    <?php }?>

    <!-- Order Items Table -->
    <div class="table-responsive mb-4">
    <table id="orderTable" class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price (₦)</th>
                <th>Total (₦)</th>
                
            </tr>
        </thead>
        <tbody>
           
<?php if (!empty($sales)) {
    $counter = 1;
    foreach ($sales as $sale) { ?>
        <tr>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $sale['product_name']; ?></td>
            <td><?php echo $sale['qty']; ?></td>
            <td><?php echo number_format($sale['price'], 2); ?></td>
            <td><?php echo number_format($sale['qty'] * $sale['price'], 2); ?></td>
        </tr>
<?php } 
} else { ?>
    <tr>
        <td colspan="5" class="text-center text-danger">No orders found for this customer.</td>
    </tr>
<?php } ?>

        </tbody>
    </table>
</div>

    <!-- Back Button -->
    <a href="salesView.php" class="btn btn-custom">← Back to Sales</a>
</div>



<script>
$(document).ready(function() {
    $('#orderTable').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "lengthChange": false,
        "pageLength": 10,
        "language": {
        "search": "Search Products:"
        }
    });
});
</script>

</body>
</html>
