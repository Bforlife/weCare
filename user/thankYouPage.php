<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You | Order Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .thank-you-container {
            background: var(--secondary-color);
            padding: 40px;
            text-align: center;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
        }

        .thank-you-container h1 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 2em;
        }

        .thank-you-container p {
            font-size: 1.1em;
        }

        .btn-home {
            margin-top: 25px;
            padding: 12px 24px;
            background-color: var(--button-bg);
            color: var(--button-text);
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
        }

        .btn-home:hover {
            background-color: #2e1f18; 
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <h1>🎉 Thank You!</h1>
        <p>Your order has been placed successfully.</p>
        <p>We appreciate your trust in us.</p>
        <a href="index.php" class="btn-home">Back to Home</a>
    </div>
</body>
</html>
