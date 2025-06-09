<?php

session_start();

class UserLogin {
    protected $db;

    public function __construct() {
        require '../Database/dbconfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }


    public function user_login($email, $password) {
        if(($email && $password ) ==""){
            return "Enter your email addres and password";
        }
        else{
        // Select the email and the password from the accounts table
        $sel = $this->db->prepare("SELECT * FROM customer WHERE email = :email AND password = :password");
        $sel->execute(array(':email' => $email, ':password' => $password));
        $user = $sel->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            $_SESSION['id'] = $user['id']; 
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['service_address'] = $user['service_address'];
        
            // print_r($user);
            return "success";
        } else {
            return "Invalid email or password";
        }
    }
    
        }
   
    }
?>