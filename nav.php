<?php require 'phpHeaderFiles.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weCare</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap/min.js"></script>
    <script src="jQuery/jQuery.js"></script>
 
    <link rel="stylesheet" href="css/navStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <div>
    <!-- Navigation Bar -->
 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="containerNav">
            <div class="logoDiv">
        <div><a class="navbar-brand" href="index.php">
                <img src="pics/weCareLogo1.png" alt="weCare Logo" width="110" style="border-radius: 50%; margin-left:30px">
            </a></div>
        <!-- <div> <button id="menu-btn" class="menu-btn">menu</button></div> -->
</div>
            
           
          
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                 
                    <li class="nav-item"><a class="" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="" href="detailspage.php">Product Details</a></li>
                    
                    <li class="nav-item dropdown">
                        <a class=" dropdown-toggle" href="#" id="categoriesDropdown" role="button" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <div class="dropdown-container">
                                <li><a class="dropdown-item" href="#">Makeup</a></li>
                                <li><a class="dropdown-item" href="#">Brushes</a></li>
                                <li><a class="dropdown-item" href="#">Skin Care</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
                <!-- support area -->
                <div class="support">


                <div><a class="" href="cartPage.php"> <i class="fa-solid fa-cart-arrow-down"></i><span class="spanCount">
                    <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>

            </a>
                </span></div>

                <div><a href="createAccount"> <i class="fa-solid fa-headset"></i></a></div>

                <div><a class="" href="login.php"> <i class="fa-solid fa-right-to-bracket"></i></a></div>
            </div>
        
    </div>
        </div>
    </nav>

  
    
  </body>

  <script src="js/scripts.js"></script>
</html>