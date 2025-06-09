<?php 
    require 'headerFiles.php'; 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    
    <!-- Bootstrap and DataTables CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

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
        }

        .btn-custom {
            background-color: var(--button-bg);
            color: var(--button-text);
        }

        .btn-custom:hover {
            background-color: var(--accent-color);
            color: #fff;
        }

        .table th {
            background-color: var(--secondary-color);
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid var(--accent-color);
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: var(--background-color);
        }

        .rounded-circle {
            border-radius: 50%;
        }

        a {
            text-decoration: none;
            color: green;
        }

        a:hover {
            color: #3C2A21;
        }
    </style>
</head>

<body>
    <div class="container col-10  m-auto pt-4 my-4">
        <h2 class="text-center mb-4">Products</h2>

        <div class="table-responsive">
            <table id="productsTable" class="table">
                <thead>
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
                    <?php if (!empty($products)){ ?>
                        <?php foreach ($products as $row){
                            $image = explode(',', $row['image']);
                        ?>
                        <tr>
                            <td><img src="<?php echo $image[0]; ?>" alt="Image" width="50" class="rounded-circle"></td>
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
                                <form method="POST" action="../controls/deleteProduct.php" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php }?>
                    <?php }else{ ?>
                        <tr>
                            <td colspan="13" class="text-center">No products found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <a href="index.php" class="btn btn-custom">Back to Homepage</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../jQuery/jQuery.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#productsTable').DataTable();
        });
    </script>
</body>
</html>
