
<?php //require 'headerFilesUser.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | wecare</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery.js"></script>
    <link rel="stylesheet" href="../css/userIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
<body>
    <div class="container-fluid">
      <?php require 'nav.php';?>
            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 dashboard-content">
                <div class="d-flex justify-content-between">
                    <div>  <h2>Welcome Back, <?php echo $_SESSION['name'];  ?></h2></div>
                    <div><a href="../logout.php" class="nav-link"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li></div>
                </div>
              
                <p>Here is your account summary and recent activity.</p>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <h5>Orders👀😃</h5>
                            <p>Manage your recent purchases.</p>
                            <a href="orders.php" class="btnCard"  style="background-color: #3C2A21; color:white; border:none; text-decoration: none; text-align:center; height:auto; border-radius:4px; font-size:20px;">View Orders</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <h5>😘😎😍😎</h5>
                            <p>Empty Card</p>
                            <a href="#" class=" btnCard" style="background-color: #3C2A21; color:white; border:none; text-decoration: none; text-align:center; height:auto; border-radius:4px; font-size:20px;">View Wishlist</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <h5>Account Settings🧑</h5>
                            <p>Manage your personal information and password.</p>
                            <a href="updateDetails.php" class="btnCard" style="background-color: #3C2A21; color:white; border:none; text-decoration: none; text-align:center; height:auto; border-radius:4px; font-size:20px;">Update Settings</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <div>
        <?php  require "orderRequire.php";?>
    </div>

    <?php ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
