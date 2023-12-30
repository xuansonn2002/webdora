<?php
require_once '../../core/db/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    @session_start();
    if(isset($_SESSION['email']) && $_SESSION['email'] != "" && $_SESSION['role'] == "admin") {
        $order_list = get_all_order();
        include_once '../view/orders/_index.php';
    }
    else{
        $url='http://localhost/dora/login.php';
        header('location:' . $url);
    }
}