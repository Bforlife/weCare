<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    require '../classes/delete.php'; 

    $delete = new delete();
    $result = $delete->deleteProducts($id);

    echo $result;
}
?>
