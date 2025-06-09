<?php

// Use the Configuration class 
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

require __DIR__ . '../../vendor/autoload.php';
class insert {
    protected $db;

    public function __construct() {
        require '../database/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }

     

public function products($productName, $category, $price, $quantity, $description, $image, $color, $size, $costPrice, $sellingPrice, $openingStock, $closingStock, $productCode,$filetype ) {
 
    // validation for selecting 2 images
    if(count($image)<=1){
        return " Select at least 2 images";
    }
    // validation 2 images end
    
              // Cloudinary Configuration
              Configuration::instance([
                'cloud' => [
                    'cloud_name' => 'dautlarnb',
                    'api_key'    => '473596117695386',
                    'api_secret' => 'oWA5j9EeWh77EKn0ggrlEeRMznU'
                ],
                'url' => [
                    'secure' => true
                ]
            ]);
            // loop mutiple files
            $arr=[];
          for($i=0; $i<count($image); $i++){

            if($this->isValidImage($image[$i], $filetype[$i])){
              

                // Upload to Cloudinary
                $uploadResult = new UploadApi();
               $results = $uploadResult->upload($image[$i]);
               $arr[] = $results['secure_url'];
            }else{
                return "kskskks";
            }
              
           };
           $urlImage = implode(',',$arr);
    // Insert values into products table
    $uploadProducts = $this->db->prepare("INSERT INTO products
    (
    productName, category, price, quantity, description, image, color, size, costPrice, sellingPrice, openingStock, closingStock, productCode
    )
    VALUES
    (
      :productName, :category, :price, :quantity, :description, :image, :color, :size, :costPrice, :sellingPrice, :openingStock, :closingStock, :productCode
    )");

    $uploadProducts->execute(array(
        ":productName" => $productName,
        ":category" => $category,
        ":price" => $price,
        ":quantity" => $quantity,
        ":description" => $description,
        ":image" => $urlImage, 
        ":color" => $color,
        ":size" => $size,
        ":costPrice" => $costPrice,
        ":sellingPrice" => $sellingPrice,
        ":openingStock" => $openingStock,
        ":closingStock" => $closingStock,
        ":productCode" => $productCode
    ));

    if ($uploadProducts) {
       $this-> product_page_file($productName,$productCode, $urlImage);
        return true;
    } else {
        return false;
    }
}


public function isValidImage($path, $filetype){
    if(!is_readable($path)){
        return false;
    }

    $allowed_extension = array('jpg','png','jpeg');
    $extension = strtolower(pathinfo($filetype, PATHINFO_EXTENSION));

    if(!in_array($extension, $allowed_extension)){  //make sure you understand this 
        return false;
    }

    $allowed_mime_type = array('image/jpg', 'image/png', 'image/jpeg');
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($path);
    
    if(!in_array($mime, $allowed_mime_type)){
        return false;
    }

    return true; 
    
}


public function product_page_file($title,$product_code, $img){

    $image = explode(',',$img);

    $url = str_replace(' ','-',$title,);
    $path = '../'.$url.'-'.$product_code.'.php';

    $content = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jQuery.js"></script>
    <link rel="stylesheet" href="css/detailsPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php  require "nav.php"  ?>
<?php require "product_page-details.php"  ?>
    
</body>
</html>';

file_put_contents($path, $content);



}
       
    public function checkOut($name,$email,$phone,$empty, $password) {
        // Insert values into customer table
        $empty=" ";
        $insertAccounts = $this->db->prepare("INSERT INTO customer
        (name, email,phone, service_address, referral_source, password, reg_date)
        VALUES
        (:name, :email,:phone,:service_address,:referral_source, :password, :reg_date )");

        $insertAccounts->execute(array(
           
            ":password" => $password,
            ":name" => $name,
            ":email" => $email,
            ":phone" => $phone,
            ":service_address" => $empty,
            ":referral_source" => $empty,
            ":reg_date" => date('Y-m-d H:i:s')

        ));

        if ($insertAccounts) {
            return true;
        } else {
            return False;
        }
    

    }

    // review insert
    public function insertReviews($customer_name, $email, $star, $review_msg, $order_id, $prdt_id) {
    // sanitize
    $email = strtolower(trim($email));
    $review_msg = htmlspecialchars($review_msg, ENT_QUOTES, 'UTF-8');

 

    // Validation
    if (
        empty($order_id) || 
        empty($prdt_id) || 
        empty($email) || 
        empty($customer_name) || 
        empty($review_msg) || 
        $star < 1 || $star > 5
    ) {
        return "All fields are required, and star rating must be between 1 and 5.";
    }


    $orderExists = $this->db->prepare("SELECT * FROM sales WHERE id = :order_id AND email = :email AND prdt_id = :prdt_id");
    $orderExists->execute(array(
        ':order_id' => $order_id,
        ':email' => $email,
        ':prdt_id' => $prdt_id
    ));

    if ($orderExists->rowCount() > 0) {
        return "You can only review products you've purchased.";
    }

    // Prevent duplicate reviews for same order and  product
    $checkReview = $this->db->prepare("SELECT * FROM reviews WHERE order_id = :order_id AND prdt_id = :prdt_id");
    $checkReview->execute(array(
        ':order_id' => $order_id,
        ':prdt_id' => $prdt_id
    ));


    // Insert review
    $insertReviews = $this->db->prepare("INSERT INTO reviews
        (order_id, prdt_id, customer_name, email, star, review_msg, reg_date)
        VALUES
        (:order_id, :prdt_id, :customer_name, :email, :star, :review_msg, :reg_date)");

    $insertReviews->execute(array(
        ":order_id" => $order_id,
        ":prdt_id" => $prdt_id,
        ":customer_name" => $customer_name,
        ":email" => $email,
        ":star" => $star,
        ":review_msg" => $review_msg,
        ":reg_date" => date('Y-m-d H:i:s')
    ));

    return $insertReviews->rowCount() > 0;
}

public function sales($prdt_id, $prdt_code, $prdt_name, $price, $qty, $color, $size, $total, $customer_name, $phone, $email, $shipping_address, $order_id, $order_date, $order_note, $pay_option, $delivery_date)
{
    // The below function checks to make sure a closing stock reduces when a sale is made

    // 1. Fetch current stock
    $checkStock = $this->db->prepare("SELECT closingStock FROM products WHERE id = :id");
    $checkStock->execute(array(":id" => $prdt_id));
    $currentStock = $checkStock->fetchColumn();

    // If product is  not found
    if ($currentStock === false) {
        return "Product not found.";
    }

    // 2. Check if enough stock is available
    if ($currentStock < $qty) {
        return "Not enough stock for product: $prdt_name.";
    }

    // 3. Reduce the closingStock and update the products table
    $newStock = $currentStock - $qty;
    $updateStock = $this->db->prepare("UPDATE products SET closingStock = :closingStock WHERE id = :id");
    $updateStock->execute(array(
        ":closingStock" => $newStock,
        ":id" => $prdt_id
    ));

    // 4. Insert sale
    $uploadSales = $this->db->prepare("INSERT INTO sales
    (
        prdt_id, prdt_code, prdt_name, price, qty, color, size, total, customer_name,
        phone, email, shipping_address, order_id, order_date, order_note, pay_option,
        payment_status, delivery_date
    )
    VALUES
    (
        :prdt_id, :prdt_code, :prdt_name, :price, :qty, :color, :size, :total, :customer_name,
        :phone, :email, :shipping_address, :order_id, :order_date, :order_note, :pay_option,
        :payment_status, :delivery_date
    )");

    $uploadSales->execute(array(
        ":prdt_id" => $prdt_id,
        ":prdt_code" => $prdt_code,
        ":prdt_name" => $prdt_name,
        ":price" => $price,
        ":qty" => $qty,
        ":color" => $color,
        ":size" => $size,
        ":total" => $total,
        ":customer_name" => $customer_name,
        ":phone" => $phone,
        ":email" => $email,
        ":shipping_address" => $shipping_address,
        ":order_id" => $order_id,
        ":order_note" => $order_note,
        ":order_date" => $order_date,
        ":pay_option" => $pay_option,
        ":payment_status" => 'pending',
        ":delivery_date" => $delivery_date
    ));

    if ($uploadSales) {
        return 'inserted';
    } else {
        return 'insert failed';
    }
}



// create the admin registration
    public function adminRegistration($name,$email, $password) {
        // Insert values into admin table
    
        $insertAdmin = $this->db->prepare("INSERT INTO admin
        (name, email, password, reg_date)
        VALUES
        (:name, :email,:password, :reg_date )");

        $insertAdmin->execute(array(
           
            ":password" => $password,
            ":name" => $name,
            ":email" => $email,
            ":reg_date" => date('Y-m-d H:i:s')

        ));

        if ($insertAdmin) {
            return true;
        } else {
            return False;
        }
    }


    }

?>















