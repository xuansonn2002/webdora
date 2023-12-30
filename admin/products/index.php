<?php
require_once '../../core/db/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_list = get_all_categories();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    @session_start();
    if(isset($_SESSION['email']) && $_SESSION['email'] != "" && $_SESSION['role'] == "admin") {
        $product_list = get_all_products();
        $category_list = get_all_categories();
        include_once '../view/products/_index.php';
    }
    else{
        $url='http://localhost/dora/login.php';
        header('location:' . $url);
    }

}