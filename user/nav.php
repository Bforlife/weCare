<?php require 'headerFilesUser.php';?>
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
            <h3 class="text-center m-auto pt-3">My Account</h3>
            <!-- <img src="../pics/weCareLogo.png" alt="weCare Logo" style="border-radius: 50%; margin-left:70px; margin-top:15px; width:80px;"> -->
        </a>
        <div class="ps-2">
            <!-- begin nav -->
            <div class="navDpy ps-3 mt-3">
    <div><i class="fas fa-tachometer-alt"></i></div>
    <div><a href="index.php">Dashboard</a></div>
</div>
<div class="navDpy ps-3">
    <div><i class="fas fa-shopping-bag"></i></div>
    <div><a href="orders.php">My Orders</a></div>
</div>
<div class="navDpy ps-3">
    <div><i class="fas fa-shopping-cart"></i><span class="spanCount"> <?php echo @count($_SESSION['cart']); ?></span></div>
    <div><a href="cart.php">My Cart</a></div>
</div>
<!-- <div class="navDpy ps-3">
    <div><i class="fas fa-heart"></i></div>
    <div><a href="">Wishlist</a></div>
</div> -->
<div class="navDpy ps-3">
    <div><i class="fas fa-user"></i></div>
    <div><a href="updateDetails.php">My Profile</a></div>
</div>
<div class="navDpy ps-3">
    <div><i class="fas fa-map-marker-alt"></i></div>
    <div><a href="address.php">Addresses</a></div>
</div>
<div class="navDpy ps-3">
    <div><i class="fas fa-credit-card"></i></div>
    <div><a href="option.php">Payment Methods</a></div>
</div>
<div class="navDpy ps-3">
    <div><i class="fa-solid fa-magnifying-glass"></i></div>
    <div><a href="review.php">Review</a></div>
</div>
<!-- <div class="navDpy ps-3">
    <div><i class="fas fa-truck"></i></div>
    <div><a href="">Track Order</a></div>
</div> -->

<div class="navDpy ps-3">
    <div><i class="fas fa-sign-out-alt"></i></div>
    <div class="text-white"><a href="logout.php" class="logout text-white">Logout</a></div>
</div>

<!-- end of nav -->
        </div>
    </div>
</body>
<script src="../js/navScripts.js"></script>
</html>