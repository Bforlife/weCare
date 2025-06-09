<?php

    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=wecare', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //create the table
    $productsTb = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        productName VARCHAR(255) NOT NULL,
        category VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        quantity INT NOT NULL,
        description TEXT,
        image VARCHAR(255),
        color VARCHAR(50),
        size VARCHAR(50),
        costPrice DECIMAL(10, 2) NOT NULL,
        sellingPrice DECIMAL(10, 2) NOT NULL,
        openingStock INT NOT NULL,
        closingStock INT NOT NULL,
        productCode VARCHAR(100) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Execute the query
    $pdo->exec($productsTb);
    echo "Table 'products' created successfully.";
