<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery.js"></script>
    <link rel="stylesheet" href="css/footerStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Footer Section -->
    <footer class="footer bg-dark text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left infoFooter">
                <!-- Customer Service -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Customer Service</h5>
                    <p><a href="#" class="text-white link">Help Center</a></p>
                    <p><a href="#" class="text-white link">Returns</a></p>
                    <p><a href="#" class="text-white link">Shipping</a></p>
                    <p><a href="#" class="text-white link">FAQs</a></p>
                </div>

                <!-- Company Info -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Company</h5>
                    <p><a href="#" class="text-white link">About Us</a></p>
                    <p><a href="#" class="text-white link">Careers</a></p>
                    <p><a href="#" class="text-white link">Privacy Policy</a></p>
                    <p><a href="#" class="text-white link">Terms of Service</a></p>
                </div>

                <!-- Social Media -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Follow Us</h5>
                    <a href="#" class="text-white social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white social-icon"><i class="fab fa-linkedin"></i></a>
                </div>

                <!-- Newsletter -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Newsletter</h5>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block mt-2">Subscribe</button>
                    </form>
                </div>
            </div>

            <hr class="mb-4">
            <div class="row align-items-center text-light">
            <div class="col-md-7 col-lg-8  text-light">
                <p>©<?php echo date("Y"); ?>  <h4 style="color: white;">WeCare. All Rights Reserved.</h4></p>
            </div>  
                <div class="col-md-5 col-lg-4">
                    <p style="color: white;">Powered by <a href="#" class="text-warning link  text-light">WeCare</a></p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>