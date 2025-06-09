<?php //require 'phpHeaderFiles.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Display</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="css/detailsPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="product-reviews">
    <h3>Customer Reviews</h3>
<?php foreach($allReviews as $row){ ?>
    <p>
        <?php
        // Display the number of stars
        for($i = 0; $i < $row['star']; $i++) {
            echo "⭐";
        }
        ?>
        - <?php echo $row['review_msg']; ?>
    </p>
<?php } ?>

</div>
</body>
</html>