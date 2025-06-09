<?php 


use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

require __DIR__ . '../../vendor/autoload.php';

class update {
    protected $db;




    public function __construct() {
        require '../database/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }


// update product quantity
public function updateQuantity($id, $quantity){

    $update = $this->db->prepare("UPDATE products SET quantity = :quantity WHERE id = :id");
    $update->execute(array(":quantity" => $quantity, ":id" => $id));
    if ($update) {
        return "Quantity Status Updated";
    } else {
        return "Failed to Update Quantity Status";
    }

}

// update customer details
public function updateCustomer($id, $name, $email, $password, $phone, $service_address, $referral_source)
{

    $update = $this->db->prepare("UPDATE customer SET name =:name, email=:email, phone=:phone, password=:password, service_address = :service_address, referral_source =:referral_source  WHERE id = :id");
    $update->execute(array( ":name"=>$name, ":email"=>$email, ":password"=>$password, ":phone"=>$phone,":service_address" => $service_address,":referral_source"=>$referral_source, ":id" => $id));
    
    
if ($update->rowCount() > 0) {
    return "Customer Status Updated";
} else {
    return "No changes made to Customer Status";
}

}


// update sales
public function updateSales($order_id, $delivery_date, $payment_status) {
    $update = $this->db->prepare("UPDATE sales SET delivery_date = :delivery_date, payment_status = :payment_status WHERE order_id = :order_id");
    $update->execute(array(
        ":delivery_date" => $delivery_date,
        ":payment_status" => $payment_status,
        ":order_id" => $order_id
    ));

    return "success";
  
}




// update products
   // Image validation function moved outside of the updateProducts() function


public function updateProducts($id, $productName, $category, $price, $quantity, $description, $image, $color, $size, $costPrice, $sellingPrice, $openingStock, $closingStock, $productCode)
{
    // Cloudinary Config
    Configuration::instance([
        'cloud' => [
            'cloud_name' => 'dautlarnb',
            'api_key'    => '473596117695386',
            'api_secret' => 'oWA5j9EeWh77EKn0ggrlEeRMznU'
        ],
        'url' => ['secure' => true]
    ]);
    function isValidImage($path, $filetype) {
    if (!is_readable($path)) return false;

    $allowed_extension = ['jpg', 'png', 'jpeg'];
    $extension = strtolower(pathinfo($filetype, PATHINFO_EXTENSION));
    if (!in_array($extension, $allowed_extension)) return false;

    $allowed_mime = ['image/jpg', 'image/jpeg', 'image/png'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($path);

    return in_array($mime, $allowed_mime);
}

    // Initialize the $imageStr variable to an empty string
    $imageStr = '';

    // Check if images were uploaded
    if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"][0])) {
        // Validate count and images selected
        if (count($_FILES["image"]["name"]) < 2) {
            echo "<script>alert('Please select at least 2 images.'); history.back();</script>";
            return; // exit the function if not enough images are selected
        }

        // Array to store new image URLs
        $newImageURLs = [];

        // Loop through uploaded images
        foreach ($_FILES['image']['tmp_name'] as $i => $tmpPath) {
            $filetype = $_FILES['image']['name'][$i];
            if (isValidImage($tmpPath, $filetype)) {
                $uploadResult = new UploadApi();
                $response = $uploadResult->upload($tmpPath);
                $newImageURLs[] = $response['secure_url'];
            } else {
                echo "<script>alert('Invalid image detected.'); history.back();</script>";
                return; // exit the function if invalid image detected
            }
        }

        // Combine all new image URLs
        $imageStr = implode(',', $newImageURLs);
    } else {
        // If no new image uploaded, get old image from the database
        $stmt = $this->db->prepare("SELECT image FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // If old image exists, retain it
        if ($row && isset($row['image'])) {
            $imageStr = $row['image'];
        } else {
            $imageStr = ''; // Set to empty string if no image exists
        }
    }

    // Update product information in the database
    $update = $this->db->prepare("UPDATE products SET 
        productName = :productName, 
        category = :category, 
        price = :price, 
        quantity = :quantity, 
        description = :description, 
        image = :image, 
        color = :color, 
        size = :size, 
        costPrice = :costPrice, 
        sellingPrice = :sellingPrice, 
        openingStock = :openingStock, 
        closingStock = :closingStock, 
        productCode = :productCode 
        WHERE id = :id
    ");

    $update->execute([
        ":id" => $id,
        ":productName" => $productName,
        ":category" => $category,
        ":price" => $price,
        ":quantity" => $quantity,
        ":description" => $description,
        ":image" => $imageStr,
        ":color" => $color,
        ":size" => $size,
        ":costPrice" => $costPrice,
        ":sellingPrice" => $sellingPrice,
        ":openingStock" => $openingStock,
        ":closingStock" => $closingStock,
        ":productCode" => $productCode
    ]);

    // Return success or failure message
    return "success";

  
}
}

?>