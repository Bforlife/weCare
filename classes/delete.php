<?php

class Delete {
    protected $db;




    public function __construct() {
        require '../database/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }

    // delete sales

    public function deleteSales($order_id) {
    $delete = $this->db->prepare("DELETE FROM sales WHERE order_id = :order_id");
    $delete->execute(array(":order_id" => $order_id));

    return "success";

}

// delete products

   public function deleteProducts($id) {
    $delete = $this->db->prepare("DELETE FROM products WHERE id = :id");
    $delete->execute(array(":id" => $id));

    return "success";

}

}
?>