<?php

session_start();

class adminLogin {
    protected $db;

    public function __construct() {
        require '../Database/dbconfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }


    public function admin_login($email, $password) {
        if(($email && $password ) == ""){
            return "Enter your email addres and password";
        }
        else{
        // Select the email and the password from the admin table
        $sel = $this->db->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
        $sel->execute(array(':email' => $email, ':password' => $password));
        $admin = $sel->fetch(PDO::FETCH_ASSOC);
    
        if ($admin) {
            $_SESSION['id'] = $admin['id']; 
            $_SESSION['name'] = $admin['name'];
            $_SESSION['email'] = $admin['email'];
            $_SESSION['password'] = $admin['password'];
        
            return "success";
        } else {
            return "Invalid email or password";
        }
    }
    
        }
   
    }
?>