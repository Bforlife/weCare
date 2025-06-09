<?php
class Database{


    public function dsn(){
        $pdo = new pdo ('mysql:host=localhost;dbname=wecare','root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        
    }
    }

?>
