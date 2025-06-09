<?php 
class  selectClassesUser {  
    
    protected $db;

    public function __construct() {
        require '../database/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }



    public function getSingleProduct($id){
            $select = $this->db->prepare("SELECT * FROM products WHERE productCode=:id");
            $select->execute(array(":id"=>$id));
            if($select->rowCount() > 0){
            $allProducts = $select->fetch(PDO::FETCH_OBJ);
            return $allProducts;
       
    }}



// Fetch products
    public function getProducts(): mixed {
        $select = $this->db->prepare("SELECT * FROM products");
        $select->execute();
        if ($select->rowCount() > 0) {
            $products = $select->fetchAll();
            return $products;
}
        return []; 
    }


        // fetch sales
     public function fetchSales() {
    $select = $this->db->prepare("SELECT * FROM sales");
    $select->execute();
    return $select->fetchAll();
}

// Fetch and count the sales

public function totalSales(){
    $total =$this->db->prepare("SELECT COUNT(*) FROM sales");
    $total->execute();
    $totalSales = $total->fetch(PDO::FETCH_NUM);
  
    return $totalSales[0];
}



   

// select the transfers

    public function transfer() {
        $transfer = $this->db->prepare("SELECT COUNT(*) FROM sales WHERE pay_option =  'transfer'");
        $transfer->execute();
       
            $totaltransfer = $transfer->fetch(PDO::FETCH_NUM);
            return $totaltransfer[0];
      
    }


    // select the card payments

    
    public function cardPayment() {
        $card = $this->db->prepare("SELECT COUNT(*) FROM sales WHERE pay_option =  'card'");
        $card->execute();
       
            $totalcardPayment = $card->fetch(PDO::FETCH_NUM);
            return $totalcardPayment[0];
      
    }

    // search function

       public function searchProducts($keyword) {
        $search = "SELECT * FROM products 
            WHERE productName LIKE :keyword 
            OR category LIKE :keyword 
            OR productCode LIKE :keyword 
            OR sellingPrice LIKE :keyword 
            OR price LIKE :keyword 
            OR description LIKE :keyword";

        $response = $this->db->prepare($search);
        $response->execute(['keyword' => "%$keyword%"]);

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }


    // select user orders

    public function getUserOrders($customerEmail) {
    $userOrders = $this->db->prepare("SELECT * FROM sales WHERE email = :email ORDER BY order_date DESC");
    $userOrders->execute(array(':email' => $customerEmail));

    $custOrders = [];
    while ($row = $userOrders->fetch(PDO::FETCH_ASSOC)) {
        $custOrders[] = $row;
    }

    return $custOrders;
}


// select by order_id

public function getOrderById($order_id) {
    $order_ids = $this->db->prepare("SELECT * FROM sales WHERE order_id = :order_id");
    $order_ids->execute(array(':order_id' => $order_id));
    return $order_ids->fetch(PDO::FETCH_ASSOC); 
}

    
    
// select by multiple order_ids

public function getOrderByIds($order_id) {
    $stmt = $this->db->prepare("
        SELECT 
            s.qty, 
            s.price, 
            s.customer_name, 
            s.phone, 
            s.email, 
            s.order_date,
            s.order_id,
            p.productName AS product_name
        FROM sales s
        JOIN products p ON s.prdt_id = p.id
        WHERE s.order_id = :order_id
    ");
    $stmt->execute(array(':order_id' => $order_id));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



}
    
    
    
    
    ?>