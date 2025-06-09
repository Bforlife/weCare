<?php


require '../classes/productUploadClass.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $obj = new insert();

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $date = date('Y:M:D');
     
        $adminReg = $obj->adminRegistration($name,$email, $password);

 if ($adminReg === true) {
            echo "success"; 
        } else {
            echo $adminReg; 
        }
    }


?>