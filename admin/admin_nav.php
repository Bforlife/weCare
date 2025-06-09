<?php require "headerFiles.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Navigation</title>
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/adminNav.css">
    <script src="../jQuery/jQuery.js"></script>
</head>
<body>
    <button class="menu-btn" id="menu-btn">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <a href="index.php" class="text-white text-decoration-none d-flex align-items-center">
            <img src="../pics/weCareLogo.png" alt="weCare Logo" style="border-radius: 50%; margin-left:70px; margin-top:15px; width:80px;">
        </a>
        <div class="ps-2">
            <!-- begin nav -->
            <div class="navDpy ps-3 mt-3">
                <div><i class="fas fa-tachometer-alt"></i></div>
                <div><a href="index.php">Dashboard</a></div>
            </div>
            <div class="navDpy ps-3">
                <div><i class="fa-solid fa-cart-plus"></i></div>
                <div><a href="addProducts.php">Add Products</a></div>
            </div>
            <div class="navDpy ps-3">
                <div><i class="fa-brands fa-product-hunt"></i></div>
                <div><a href="prdts.php">Products</a></div>
            </div>
            <div class="navDpy ps-3">
                <div><i class="fas fa-chart-line"></i></div>
                <div><a href="salesView.php">Sales</a></div>
            </div>
    
            <div class="navDpy ps-3">
                <div><i class="fas fa-sign-out-alt"></i></div>
                <div><a href="logout" class="logout text-white">Logout</a></div>
            </div>
            <!-- end of nav -->
        </div>
    </div>
</body>
</html>