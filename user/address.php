<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Address</title>
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
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      color: var(--text-color);
    }

    .address-section {
      background-color: var(--secondary-color);
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      max-width: 900px;
      margin: 40px auto;
    }

    .address-section h2 {
      margin-bottom: 15px;
      font-size: 24px;
      color: var(--primary-color);
    }

    .map-container {
      position: relative;
      padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
      height: 0;
      overflow: hidden;
      border-radius: 10px;
    }

    .map-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0;
    }

    @media (max-width: 600px) {
      .address-section {
        padding: 15px;
      }

      .address-section h2 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>

<?php require 'nav.php'; ?>
  <div class="address-section">
    <h2>Current Location</h2>
    <div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63449.13581392901!2d8.059714133892799!3d6.319944140740546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105ca0692143e095%3A0xe38f8845a6d5a3ae!2sAbakaliki%2C%20Ebonyi!5e0!3m2!1sen!2sng!4v1746691331151!5m2!1sen!2sng" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

</body>
</html>
