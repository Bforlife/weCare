<?php

    require '../classes/adminLoginClass.php';
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $admin = new adminLogin;
    
        $login_result = $admin->admin_login($email, $password);
  
        echo $login_result;
    }

  
    ?>

