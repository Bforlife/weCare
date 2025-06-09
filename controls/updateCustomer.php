<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email =$_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $service_address = $_POST['service_address'];
    $referral_source = $_POST['referral_source'];


    require '../classes/update.php';
    
    $update = new update();

    $updateCustomer = $update->updateCustomer($id, $name, $email, $password, $phone, $service_address,
     $referral_source);

    echo $updateCustomer;

    
    if ($updateCustomer) {
        header("Location: ../user/updateDetails.php?alert=Details Update Successful");
    } else {
        header("Location: ../user/updateDeatails.php?warning=Details Update Failed");
    }


    
 
}



?>