<?php
session_start();
// get the payment methos and add to session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_option = $_POST['pay_option'];

    if (isset($_SESSION['customer_details'])) {
        $_SESSION['customer_details']['pay_option'] = $selected_option;
    } else {
        $_SESSION['customer_details'] = ['pay_option' => $selected_option];
    }

    // Redirect based on selected option
    if ($selected_option === 'card') {
        header("Location: payment.php");

    } elseif ($selected_option === 'transfer') {
        header("Location: transfer.php");

    } else {
        echo "Invalid payment option selected.";
    }
} else {
    echo "Invalid request method.";
}


?>